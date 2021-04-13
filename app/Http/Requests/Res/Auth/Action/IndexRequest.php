<?php

namespace App\Http\Requests\Res\Auth\Action;

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
        'module' => 'action',
        'action' => 'index',
    ];
}
