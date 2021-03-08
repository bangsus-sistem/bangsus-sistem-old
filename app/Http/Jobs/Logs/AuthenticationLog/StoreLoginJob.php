<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Database\Models\Logs\AuthenticationLog;

class StoreLoginJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreLoginRequest  $request
     * @param  \App\Database\Models\Auth\User|null  $user
     * @return \App\Database\Models\Logs\AuthenticationLog
     */
    public function handle($request, $user = null)
    {
        $authenticationLog = new AuthenticationLog;
        $authenticationLog->user_id = $user->id;
        $authenticationLog->state = true;
        $authenticationLog->save();
        
        return $authenticationLog;
    }
}
