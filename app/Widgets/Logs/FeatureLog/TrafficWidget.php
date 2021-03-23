<?php

namespace App\Widgets\Logs\FeatureLog;

use App\Abstracts\Widget;

class TrafficWidget extends Widget
{
    /**
     * @param  \App\Http\Requests\Res\Logs\FeatureLog\RevealTrafficRequest  $request
     * @return mixed
     */
    public function compute($request)
    {
        $featureLogs = \DB::table('feature_logs');
        
        $this->data = [
            'requests_count' => with($featureLogs)
                ->count(),
            'features_count' => with($featureLogs)
                ->distinct()
                ->count('feature_id'),
            'users_count' => with($featureLogs)
                ->distinct()
                ->count('user_id'),
        ];
    }
}
