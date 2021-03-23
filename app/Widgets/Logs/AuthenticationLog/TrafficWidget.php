<?php

namespace App\Widgets\Logs\AuthenticationLog;

use App\Abstracts\Widget;

class TrafficWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\RevealTrafficRequest  $request
     * @return mixed
     */
    public function compute($request)
    {
        $authenticationLogs = \DB::table('authentication_logs');
        
        $this->data = [
            'users_count' => with(clone $authenticationLogs)
                ->distinct()
                ->count('user_id'),
            'logins_count' => with(clone $authenticationLogs)
                ->where('state', 1)
                ->count(),
            'logouts_count' => with(clone $authenticationLogs)
                ->where('state', 0)
                ->count(),
        ];
    }
}
