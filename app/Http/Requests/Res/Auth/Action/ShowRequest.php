<?php

namespace App\Http\Requests\Res\Auth\Action;

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
        'module_ref' => 'action',
        'action_ref' => 'read',
    ];
}
