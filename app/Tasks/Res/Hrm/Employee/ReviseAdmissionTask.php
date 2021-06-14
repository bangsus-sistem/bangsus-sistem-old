<?php

namespace App\Tasks\Res\Hrm\Employee;

use App\Foundation\Task;
use App\Models\Hrm\Employee;

class ReviseAdmissionTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\ReviseAdmissionRequest  $request
     * @return \App\Models\Hrm\Employee
     */
    public function handle($request)
    {
        $employee = Employee::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employee, $state) {
                $employee->admit();
            }
        );

        return $employee;
    }
}
