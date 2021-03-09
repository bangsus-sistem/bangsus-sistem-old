<?php

namespace App\Http\Jobs\Logs\FeatureLog;

use App\Abstracts\Http\Job;
use App\Database\Models\Logs\FeatureLog;

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Logs\FeatureLog\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $featureLog = FeatureLog::findOrFail($request->input('id'));
        $featureLog->delete();
    }
}
