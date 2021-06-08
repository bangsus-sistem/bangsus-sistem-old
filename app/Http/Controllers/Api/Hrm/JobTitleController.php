<?php

namespace App\Http\Controllers\Api\Hrm;

use App\Http\Controllers\Res\Hrm\JobTitleController as Controller;
use App\Http\Requests\Api\Hrm\JobTitle\{
    AmendRequest,
};
use App\Tasks\Api\Hrm\JobTitle\AmendTask;
use App\Transformer\RelatedResources\Hrm\JobTitleRelatedResource;

class JobTitleController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\JobTitle\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new JobTitleRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
