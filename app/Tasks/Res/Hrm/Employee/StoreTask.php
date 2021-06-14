<?php

namespace App\Tasks\Res\Hrm\Employee;

use App\Foundation\Task;
use App\Models\Hrm\Employee;
use App\Models\Auth\Feature;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\StoreRequest  $request
     * @return \App\Models\Hrm\Employee
     */
    public function handle($request)
    {
        $employee = new Employee;
        $this->transaction(
            function () use ($request, $employee) {
                $employee->nik = $request->input('nik');
                $employee->full_name = $request->input('full_name');
                $employee->place_of_birth = $request->input('place_of_birth');
                $employee->date_of_birth = $request->input('date_of_birth');
                $employee->blood_type_id = $request->input('blood_type_id');
                $employee->gender_id = $request->input('gender_id');
                $employee->first_branch_id = $request->input('first_branch_id');
                $employee->first_job_title_id = $request->input('first_job_title_id');
                $employee->start_date = $request->input('start_date');
                $employee->description = $request->input('description');
                $employee->note = $request->input('note');
                $employee->save();

                if (Feature::getAuthorization(['module' => 'employee', 'action' => 'admit']))
                    $employee->admit();
            }
        );

        return $employee;
    }
}
