<?php

namespace App\Http\Controllers\Api\Hrm;

use App\Http\Controllers\Res\Hrm\EmployeeController as Controller;
use App\Http\Requests\Api\Hrm\Employee\{
    AmendRequest,
};
use App\Tasks\Api\Hrm\Employee\AmendTask;
use App\Transformer\RelatedResources\Hrm\EmployeeRelatedResource;

class EmployeeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\Employee\AmendRequest  $request
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
