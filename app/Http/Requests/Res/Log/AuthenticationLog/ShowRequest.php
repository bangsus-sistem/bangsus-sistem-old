<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Foundation\Http\AuthRequest;

class ShowRequest extends AuthRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'authentication_log';

    /**
     * @var string
     */
    public $actionRef = 'read';
}
