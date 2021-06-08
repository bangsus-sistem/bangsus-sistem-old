<?php

namespace App\Http\Requests\Res\Hrm\EmployeePhotoType;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\EmployeePhotoType\EmployeePhotoTypeIsDeletableRule;

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
        'module' => 'employee_photo_type',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\EmployeePhotoType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new EmployeePhotoTypeIsDeletableRule($this)];
    }
}
