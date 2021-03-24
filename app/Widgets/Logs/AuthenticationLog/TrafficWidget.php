<?php

namespace App\Widgets\Logs\AuthenticationLog;

use App\Abstracts\Widget;
use Carbon\Carbon;

class TrafficWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\RevealTrafficRequest  $request
     * @return mixed
     */
    public function compute($request)
    {
        $endTimestamp = Carbon::now()->toImmutable();
        $startTimestamp = $endTimestamp->subSeconds(
            $request->query('timestamp')
        );
        $authenticationLogs = \DB::table('authentication_logs')
            ->whereBetween('created_at', [$startTimestamp, $endTimestamp]);
        
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
