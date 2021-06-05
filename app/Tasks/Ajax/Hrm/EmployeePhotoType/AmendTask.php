<?php

namespace App\Tasks\Ajax\Hrm\EmployeePhotoType;

use App\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\EmployeePhotoType\AmendRequest  $request
     * @return \App\Models\Hrm\EmployeePhotoType
     */
    public function handle($request)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employeePhotoType) {
                $employeePhotoType->code = $request->input('code');
                $employeePhotoType->name = $request->input('name');
                $employeePhotoType->required = $request->boolean('required');
                $employeePhotoType->description = $request->input('description');
                $employeePhotoType->note = $request->input('note');
                $employeePhotoType->save();
            }
        );

        return $employeePhotoType;
    }
}
