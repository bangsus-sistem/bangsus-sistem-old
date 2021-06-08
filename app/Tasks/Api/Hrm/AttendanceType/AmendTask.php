<?php

namespace App\Tasks\Api\Hrm\AttendanceType;

use App\Foundation\Task;
use App\Models\Hrm\AttendanceType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\AttendanceType\AmendRequest  $request
     * @return \App\Models\Hrm\AttendanceType
     */
    public function handle($request)
    {
        $attendanceType = AttendanceType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $attendanceType) {
                $attendanceType->code = $request->input('code', $attendanceType->code);
                $attendanceType->name = $request->input('name', $attendanceType->name);
                $attendanceType->required = $request->boolean('required', $attendanceType->required);
                $attendanceType->description = $request->input('description', $attendanceType->description);
                $attendanceType->note = $request->input('note', $attendanceType->note);
                $attendanceType->save();
            }
        );

        return $attendanceType;
    }
}
