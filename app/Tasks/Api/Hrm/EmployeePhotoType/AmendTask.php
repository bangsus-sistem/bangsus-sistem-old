<?php

namespace App\Tasks\Api\Hrm\EmployeePhotoType;

use App\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\EmployeePhotoType\AmendRequest  $request
     * @return \App\Models\Hrm\EmployeePhotoType
     */
    public function handle($request)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $employeePhotoType) {
                $employeePhotoType->code = $request->input('code', $employeePhotoType->code);
                $employeePhotoType->name = $request->input('name', $employeePhotoType->name);
                $employeePhotoType->required = $request->boolean('required', $employeePhotoType->required);
                $employeePhotoType->description = $request->input('description', $employeePhotoType->description);
                $employeePhotoType->note = $request->input('note', $employeePhotoType->note);
                $employeePhotoType->save();
            }
        );

        return $employeePhotoType;
    }
}
