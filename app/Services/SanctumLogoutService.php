<?php

namespace App\Services;

use App\Foundation\Service;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class SanctumLogoutService extends Service
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\AuthenticationLog\StoreLoginRequest  $request
     * @return \App\Models\Auth\User
     */
    public function serve($request)
    {
        $user = User::find($request->user()->id);
        Auth::guard('web')->logout($user->id);
        return $user;
    }
}
