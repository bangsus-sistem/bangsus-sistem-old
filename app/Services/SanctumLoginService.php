<?php

namespace App\Services;

use App\Foundation\Service;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class SanctumLoginService extends Service
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\StoreLoginRequest  $request
     * @return \App\Models\Auth\User
     */
    public function serve($request)
    {
        if ( ! Auth::attempt($request->only('username', 'password')))
            throw new AuthenticationException;
        
        return User::where('username', $request->input('username'))
            ->first();
    }
}
