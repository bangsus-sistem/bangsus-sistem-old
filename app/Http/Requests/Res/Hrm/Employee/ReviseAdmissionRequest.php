<?php

namespace App\Http\Requests\Res\Hrm\Employee;

use App\Foundation\Http\AuthIdRequest;

class ReviseAdmissionRequest extends AuthIdRequest
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
        'action' => 'admit',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\Employee';
}
