<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Database\Models\Logs\AuthenticationLog;

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $authenticationLog = AuthenticationLog::findOrFail($request->input('id'));
        $authenticationLog->delete();
    }
}
