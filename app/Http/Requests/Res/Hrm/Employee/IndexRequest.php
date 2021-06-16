<?php

namespace App\Http\Requests\Res\Hrm\Employee;

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
        'module' => 'employee',
        'action' => 'index',
    ];
}
