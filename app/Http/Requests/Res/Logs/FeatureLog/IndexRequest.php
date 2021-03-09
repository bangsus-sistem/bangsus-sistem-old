<?php

namespace App\Http\Requests\Res\Logs\FeatureLog;

use App\Abstracts\Http\AuthorizedRequest;

class IndexRequest extends AuthorizedRequest
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
