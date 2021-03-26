<?php

namespace App\Widgets\Logs\AuthenticationLog;

use App\Abstracts\Widget;
use Carbon\Carbon;

class LatestDataWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\RevealLatestDataRequest  $request
     * @return mixed
     */
    public function compute($request)
    {
        $this->data = [
            'authentication_logs' => \DB::table('authentication_logs')
                ->select(
                    'authentication_logs.id',
                    'authentication_logs.state',
                    'authentication_logs.created_at',
                    'users.username',
                    'users.full_name',
                )
                ->join('users', 'users.id', '=', 'authentication_logs.user_id')
                ->orderBy('authentication_logs.created_at', 'desc')
                ->take($request->query('count', 5))
                ->get(),
        ];
    }
}
