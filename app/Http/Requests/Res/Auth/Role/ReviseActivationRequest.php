<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Foundation\Http\AuthRequest;

class ReviseActivationRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'role',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Auth\Role';
}
