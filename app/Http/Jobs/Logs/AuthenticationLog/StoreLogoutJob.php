<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Database\Models\Logs\AuthenticationLog;

class StoreLogoutJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreLogoutRequest  $request
     * @param  \App\Database\Models\Auth\User|null  $user
     * @return \App\Database\Models\Logs\AuthenticationLog
     */
    public function handle($request, $user = null)
    {
        $authenticationLog = new AuthenticationLog;
        $authenticationLog->user_id = $user->id;
        $authenticationLog->state = false;
        $authenticationLog->save();
        
        return $authenticationLog;
    }
}
