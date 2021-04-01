<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Foundation\Http\AuthRequest;

class IndexRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module_ref' => 'authentication_log',
        'action_ref' => 'index',
    ];
}
