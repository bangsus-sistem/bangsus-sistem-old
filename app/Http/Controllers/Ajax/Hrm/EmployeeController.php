<?php

namespace App\Http\Controllers\Ajax\Hrm;

use App\Http\Controllers\Res\Hrm\EmployeeController as Controller;
use App\Http\Requests\Ajax\Hrm\Employee\{
    AmendRequest,
};
use App\Tasks\Ajax\Hrm\Employee\AmendTask;
use App\Transformer\RelatedResources\Hrm\EmployeeRelatedResource;

class EmployeeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Employee\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new EmployeeRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
