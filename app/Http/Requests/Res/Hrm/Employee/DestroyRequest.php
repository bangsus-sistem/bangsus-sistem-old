<?php

namespace App\Http\Requests\Res\Hrm\Employee;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\Employee\EmployeeIsDeletableRule;

class DestroyRequest extends AuthIdRequest
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
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\Employee';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new EmployeeIsDeletableRule($this)];
    }
}
