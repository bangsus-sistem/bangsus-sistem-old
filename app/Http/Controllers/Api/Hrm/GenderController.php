<?php

namespace App\Http\Controllers\Api\Hrm;

use App\Http\Controllers\Res\Hrm\GenderController as Controller;
use App\Http\Requests\Api\Hrm\Gender\{
    AmendRequest,
};
use App\Tasks\Api\Hrm\Gender\AmendTask;
use App\Transformer\RelatedResources\Hrm\GenderRelatedResource;

class GenderController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\Gender\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new GenderRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
