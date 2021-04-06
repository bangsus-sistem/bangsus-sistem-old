<?php

namespace App\Tasks\Ajax\Log\AuthenticationLog;

use App\Foundation\Task;
use App\Models\Log\AuthenticationLog;

class StoreTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth\User  $user
     * @param  boolean  $state
     * @return \App\Models\Log\AuthenticationLog
     */
    public function handle($request, $user = null, $state = true)
    {
        $authenticationLog = new AuthenticationLog;
        $this->transaction(
            function () use ($request, $authenticationLog, $user, $state) {
                $authenticationLog->user_id = $user->id;
                $authenticationLog->state = $state;
                $authenticationLog->save();
            }
        );

        return $authenticationLog;
    }
}
