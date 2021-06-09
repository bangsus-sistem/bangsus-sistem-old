<?php

namespace App\Tasks\Ajax\Hrm\AttendanceType;

use App\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\AttendanceType\AmendRequest  $request
     * @return \App\Models\Hrm\AttendanceType
     */
    public function handle($request)
    {
        $attendanceType = AttendanceType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $attendanceType) {
                $attendanceType->code = $request->input('code');
                $attendanceType->name = $request->input('name');
                $attendanceType->description = $request->input('description');
                $attendanceType->note = $request->input('note');
                $attendanceType->save();
            }
        );

        return $attendanceType;
    }
}
