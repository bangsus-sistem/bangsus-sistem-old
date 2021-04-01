<?php

namespace App\Http\Requests\Res\Log\AuthenticationLog;

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
        'module_ref' => 'authentication_log',
        'action_ref' => 'read',
    ];
}
