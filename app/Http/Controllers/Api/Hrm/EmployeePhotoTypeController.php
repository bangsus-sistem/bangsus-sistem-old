<?php

namespace App\Http\Controllers\Api\Hrm;

use App\Http\Controllers\Res\Hrm\EmployeePhotoTypeController as Controller;
use App\Http\Requests\Api\Hrm\EmployeePhotoType\{
    AmendRequest,
};
use App\Tasks\Api\Hrm\EmployeePhotoType\AmendTask;
use App\Transformer\RelatedResources\Hrm\EmployeePhotoTypeRelatedResource;

class EmployeePhotoTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\EmployeePhotoType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
