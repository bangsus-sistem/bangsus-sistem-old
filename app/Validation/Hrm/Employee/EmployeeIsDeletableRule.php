<?php

namespace App\Validation\Hrm\Employee;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\Employee;

class EmployeeIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $employee = Employee::findOrFail(
            $this->request->input('id')
        );
        // if ($employee->items()->exists()) {
        //     $this->setMessage('');
        //     return false;
        // }

        return true;
    }
}
