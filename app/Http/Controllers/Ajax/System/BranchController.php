<?php

namespace App\Http\Controllers\Ajax\System;

use App\Http\Controllers\Res\System\BranchController as Controller;
use App\Http\Requests\Ajax\System\Branch\{
    AmendRequest,
};
use App\Tasks\Ajax\System\Branch\AmendTask;
use App\Transformer\RelatedResources\System\BranchRelatedResource;

class BranchController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new BranchRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
