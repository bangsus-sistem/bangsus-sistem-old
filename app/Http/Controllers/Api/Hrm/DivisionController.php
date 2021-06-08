<?php

namespace App\Http\Controllers\Api\Hrm;

use App\Http\Controllers\Res\Hrm\DivisionController as Controller;
use App\Http\Requests\Api\Hrm\Division\{
    AmendRequest,
};
use App\Tasks\Api\Hrm\Division\AmendTask;
use App\Transformer\RelatedResources\Hrm\DivisionRelatedResource;

class DivisionController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\Division\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new DivisionRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
