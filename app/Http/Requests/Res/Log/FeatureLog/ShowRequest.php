<?php

namespace App\Http\Requests\Res\Logs\FeatureLog;

use App\Foundation\Http\AuthRequest;

class ShowRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module_ref' => 'feature_log',
        'action_ref' => 'read',
    ];
}
