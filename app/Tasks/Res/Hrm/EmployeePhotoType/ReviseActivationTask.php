<?php

namespace App\Tasks\Res\Hrm\EmployeePhotoType;

use App\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\EmployeePhotoType
     */
    public function handle($request, $state = true)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            function () use ($request, $employeePhotoType, $state) {
                $employeePhotoType->active = $state;
                $employeePhotoType->save();
            }
        );

        return $employeePhotoType;
    }
}
