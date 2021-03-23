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
            'users_count' => with($authenticationLogs)
                ->distinct()
                ->count('user_id'),
            'logins_count' => with($authenticationLogs)
                ->where('state', true)
                ->count(),
            'logouts_count' => with($authenticationLogs)
                ->where('state', false)
                ->count(),
        ];
    }
}
