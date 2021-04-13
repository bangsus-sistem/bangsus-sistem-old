<?php

namespace App\Http\Requests\Res\Auth\Widget;

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
        'module' => 'widget',
        'action' => 'read',
    ];
}
