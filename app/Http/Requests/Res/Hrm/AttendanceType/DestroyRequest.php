<?php

namespace App\Http\Requests\Res\Hrm\AttendanceType;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\AttendanceType\AttendanceTypeIsDeletableRule;

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
        'module' => 'attendance_type',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\AttendanceType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new AttendanceTypeIsDeletableRule($this)];
    }
}
