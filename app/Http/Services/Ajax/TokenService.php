<?php

namespace App\Http\Services\Ajax;

use App\Abstracts\Http\Service;
use App\Database\Models\Auth\{
    User,
    AuthenticationToken,
};
use Illuminate\Support\Facades\Auth;
use App\Exceptions\{
    AuthenticationTokenNotFoundException,
    AuthenticationTokenIsAlreadyUsedException,
    ExpiredAuthenticationTokenException,
};
use Carbon\Carbon;

class TokenService extends Service
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreTokenRequest  $request
     * @return Object
     */
    public function serve($request)
    {
        $authenticationToken = AuthenticationToken::where(
            'token', $request->input('token')
        )->first();

        if (is_null($authenticationToken))
            throw new AuthenticationTokenNotFoundException;

        if ( ! is_null($authenticationToken->used_at))
            throw new AuthenticationTokenIsAlreadyUsedException;

        if (with(new Carbon($authenticationToken->expired_at))->lessThan(now()))
            throw new ExpiredAuthenticationTokenException;

        $user = $authenticationToken->user;
        Auth::login($user);
        
        return (object) [
            'user' => $user,
            'authenticationToken' => $authenticationToken,
        ];
    }
}
