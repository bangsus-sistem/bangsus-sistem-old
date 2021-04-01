<?php

namespace App\Http\Requests\Res\Auth\User;

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
        'module_ref' => 'user',
        'action_ref' => 'read',
    ];
}
