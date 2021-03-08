<?php

namespace App\Http\Services\Ajax;

use App\Abstracts\Http\Service;
use App\Database\Models\Auth\User;
use Illuminate\Support\Facades\Auth;

class LogoutService extends Service
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreLoginRequest  $request
     * @return \App\Database\Models\Auth\User
     */
    public function serve($request)
    {
        $user = User::find(Auth::id());

        Auth::guard('web')->logout();

        return $user;
    }
}
