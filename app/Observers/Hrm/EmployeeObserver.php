<?php

namespace App\Observers\Hrm;

use App\Foundation\Observer;
use App\Models\Hrm\Employee;
use App\Models\Auth\User;

class EmployeeObserver extends Observer
{
    /**
     * @param  \App\Models\Hrm\Employee  $employee
     * @return void
     */
    public static function admitting(Employee $employee)
    {
        $employee->code = $employee->generateCode();
    }

    /**
     * @param  \App\Models\Hrm\Employee  $employee
     * @return void
     */
    public static function admitted(Employee $employee)
    {
        $employeeAssignment = new EmployeeAssignment;
        $employeeAssignment->employee_id = $employee->id;
        $employeeAssignment->branch_id = $employee->first_branch_id;
        $employeeAssignment->startDate = $employee->start_date;
        $employeeAssignment->description = '';
        $employeeAssignment->note = '';
        $employeeAssignment->save();

        $employeeMutation = new EmployeeMutation;
        $employeeMutation->employee_assignment_id = $employeeAssignment->id;
        $employeeMutation->job_title_id = $employeeAssignment->first_job_title_id;
        $employeeMutation->start_date = $employeeAssignment->start_date;
        $employeeMutation->description = '';
        $employeeMutation->note = '';
        $employeeMutation->save();
    }
}
