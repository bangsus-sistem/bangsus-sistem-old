<?php

namespace App\Loggers;

use App\Abstracts\Logger;
use App\Database\Models\Logs\FeatureLog;

class FeatureLogger extends Logger
{
    /**
     * @var bool
     */
    protected $configFlag = 'logs.log_feature';

    /**
     * @param  string  $ip
     * @param  bool  $success
     * @param  array  $data
     * @return void
     */
    public static function log($ip, $success, $data)
    {
        if ($this->configFlagAllows()) {
            $data = (object) $data;
            $featureLog = new FeatureLog;
            $featureLog->user_id = $data->user_id;
            $featureLog->ip_address = $ip;
            $featureLog->feature_id = $data->feature_id;
            $featureLog->success = $success;
            $featureLog->save();
        }
    }
}
