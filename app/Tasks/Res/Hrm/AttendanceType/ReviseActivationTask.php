<?php

namespace App\Tasks\Res\Hrm\AttendanceType;

use App\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\AttendanceType
     */
    public function handle($request, $state = true)
    {
        $attendanceType = AttendanceType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $attendanceType, $state) {
                $attendanceType->active = $state;
                $attendanceType->save();
            }
        );

        return $attendanceType;
    }
}
