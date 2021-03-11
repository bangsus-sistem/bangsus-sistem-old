<?php

namespace App\Http\Services\Ajax;

use App\Abstracts\Http\Service;
use App\Database\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\FailedLoginException;

class LoginService extends Service
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreLoginRequest  $request
     * @return \App\Database\Models\Auth\User
     */
    public function serve($request)
    {
        $user = User::where('username', $request->input('username'))->first();
        if (is_null($user)) throw new FailedLoginException;

        if ( ! Auth::attempt($request->only('username', 'password')))
            throw new FailedLoginException;
        
        return $user;
    }
}
