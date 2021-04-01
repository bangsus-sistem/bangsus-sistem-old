<?php

namespace App\Http\Requests\Res\Auth\User;

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
        'module_ref' => 'user',
        'action_ref' => 'index',
    ];
}
