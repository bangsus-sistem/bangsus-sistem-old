<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'authentication_log';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
