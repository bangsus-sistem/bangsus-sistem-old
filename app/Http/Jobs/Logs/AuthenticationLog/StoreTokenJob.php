<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Database\Models\Logs\AuthenticationLog;

class StoreTokenJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreTokenRequest  $request
     * @param  \App\Database\Models\Auth\User|null  $user
     * @param  \App\Database\Models\Auth\AuthenticationToken|null  $authenticationToken
     * @return \App\Database\Models\Logs\AuthenticationLog
     */
    public function handle($request, $user = null, $authenticationToken = null)
    {
        $authenticationLog = new AuthenticationLog;
        \DB::transaction(
            function () use ($authenticationLog, $user, $authenticationToken) {
                $authenticationToken->used_at = now();
                $authenticationToken->save();

                $authenticationLog->user_id = $user->id;
                $authenticationLog->state = true;
                $authenticationLog->save();
            }
        );
        
        return $authenticationLog;
    }
}
