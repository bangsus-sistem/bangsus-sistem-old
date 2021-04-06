<?php

namespace App\Services;

use App\Foundation\Service;
use App\Models\Auth\AuthenticationToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class SanctumAuthenticationTokenService extends Service
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\StoreLoginRequest  $request
     * @return array
     */
    public function serve($request)
    {
        $authenticationToken = AuthenticationToken::where(
            'token',
            $request->input('token')
        )
            ->notUsed()
            ->first();
        
        if (is_null($authenticationToken))
            throw new AuthenticationException;

        if (Carbon::now()->greaterThan($authenticationToken->expired_at))
            throw new AuthenticationException;
        
        Auth::loginById($authenticationToken->user->id);

        return [
            $user,
            $authenticationToken,
        ];
    }
}
