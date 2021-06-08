<?php

namespace App\Http\Controllers\Ajax\Hrm;

use App\Http\Controllers\Res\Hrm\DivisionController as Controller;
use App\Http\Requests\Ajax\Hrm\Division\{
    AmendRequest,
};
use App\Tasks\Ajax\Hrm\Division\AmendTask;
use App\Transformer\RelatedResources\Hrm\DivisionRelatedResource;

class DivisionController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Division\AmendRequest  $request
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
