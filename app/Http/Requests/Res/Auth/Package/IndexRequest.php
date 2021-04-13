<?php

namespace App\Http\Requests\Res\Auth\Package;

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
        'module' => 'package',
        'action' => 'index',
    ];
}
