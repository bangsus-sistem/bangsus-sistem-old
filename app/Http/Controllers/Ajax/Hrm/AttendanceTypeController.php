<?php

namespace App\Http\Controllers\Ajax\Hrm;

use App\Http\Controllers\Res\Hrm\AttendanceTypeController as Controller;
use App\Http\Requests\Ajax\Hrm\AttendanceType\{
    AmendRequest,
};
use App\Tasks\Ajax\Hrm\AttendanceType\AmendTask;
use App\Transformer\RelatedResources\Hrm\AttendanceTypeRelatedResource;

class AttendanceTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\AttendanceType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new AttendanceTypeRelatedResource(
                $this->transmit(new AmendTask, $request)
            ),
            200
        );
    }
}
