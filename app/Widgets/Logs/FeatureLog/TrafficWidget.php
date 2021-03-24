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
        $endTimestamp = Carbon::now()->toImmutable();
        $startTimestamp = $endTimestamp->subSeconds(
            $request->query('timestamp')
        );
        $featureLogs = \DB::table('feature_logs')
            ->whereBetween('created_at', [$startTimestamp, $endTimestamp]);
        
        $this->data = [
            'requests_count' => with(clone $featureLogs)
                ->count(),
            'features_count' => with(clone $featureLogs)
                ->distinct()
                ->count('feature_id'),
            'users_count' => with(clone $featureLogs)
                ->distinct()
                ->count('user_id'),
        ];
    }
}
