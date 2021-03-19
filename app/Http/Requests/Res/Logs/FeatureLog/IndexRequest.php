<?php

namespace App\Http\Requests\Res\Logs\FeatureLog;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'feature_log';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
