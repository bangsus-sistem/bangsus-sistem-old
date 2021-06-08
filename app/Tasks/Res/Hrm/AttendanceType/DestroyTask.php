<?php

namespace App\Tasks\Res\Hrm\AttendanceType;

use App\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $attendanceType = AttendanceType::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $attendanceType->delete()
        );
    }
}
