<?php

namespace App\Http\Requests\Res\Auth\Package;

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
        'module_ref' => 'package',
        'action_ref' => 'read',
    ];
}
