<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'authentication_log';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
