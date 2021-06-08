<?php

namespace App\Tasks\Res\Hrm\AttendanceType;

use App\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\StoreRequest  $request
     * @return \App\Models\Hrm\AttendanceType
     */
    public function handle($request)
    {
        $attendanceType = new AttendanceType;
        $this->transaction(
            function () use ($request, $attendanceType) {
                $attendanceType->code = $request->input('code');
                $attendanceType->name = $request->input('name');
                $attendanceType->active = true;
                $attendanceType->description = $request->input('description');
                $attendanceType->note = $request->input('note');
                $attendanceType->save();
            }
        );

        return $attendanceType;
    }
}
