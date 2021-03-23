<?php

namespace App\Http\Requests\Res\Logs\FeatureLog;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'feature_log';

    /**
     * @var string
     */
    public $actionRef = 'read';
}
