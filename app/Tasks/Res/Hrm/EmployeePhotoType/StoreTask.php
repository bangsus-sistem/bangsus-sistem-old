<?php

namespace App\Tasks\Res\Hrm\EmployeePhotoType;

use App\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\StoreRequest  $request
     * @return \App\Models\Hrm\EmployeePhotoType
     */
    public function handle($request)
    {
        $employeePhotoType = new EmployeePhotoType;
        $this->transaction(
            function () use ($request, $employeePhotoType) {
                $employeePhotoType->code = $request->input('code');
                $employeePhotoType->name = $request->input('name');
                $employeePhotoType->active = true;
                $employeePhotoType->required = $request->boolean('required');
                $employeePhotoType->description = $request->input('description');
                $employeePhotoType->note = $request->input('note');
                $employeePhotoType->save();
            }
        );

        return $employeePhotoType;
    }
}
