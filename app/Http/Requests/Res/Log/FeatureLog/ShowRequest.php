<?php

namespace App\Http\Requests\Res\Logs\FeatureLog;

use App\Foundation\Http\AuthRequest;

class ShowRequest extends AuthRequest
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
