<?php

namespace App\Validation\Hrm\AttendanceType;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\AttendanceType;

class AttendanceTypeIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $attendanceType = AttendanceType::findOrFail(
            $this->request->input('id')
        );
        // if ($attendanceType->items()->exists()) {
        //     $this->setMessage('');
        //     return false;
        // }

        return true;
    }
}
