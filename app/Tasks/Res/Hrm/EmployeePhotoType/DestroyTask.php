<?php

namespace App\Tasks\Res\Hrm\EmployeePhotoType;

use App\Foundation\Task;
use App\Models\Hrm\EmployeePhotoType;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail(
            $request->input('id')
        );
        $this->transaction(
            fn () => $employeePhotoType->delete()
        );
    }
}
