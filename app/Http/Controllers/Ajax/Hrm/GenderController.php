<?php

namespace App\Http\Controllers\Ajax\Hrm;

use App\Http\Controllers\Res\Hrm\GenderController as Controller;
use App\Http\Requests\Ajax\Hrm\Gender\{
    AmendRequest,
};
use App\Tasks\Ajax\Hrm\Gender\AmendTask;
use App\Transformer\RelatedResources\Hrm\GenderRelatedResource;

class GenderController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Gender\AmendRequest  $request
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
