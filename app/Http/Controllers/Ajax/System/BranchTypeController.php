<?php

namespace App\Http\Controllers\Ajax\System;

use App\Http\Controllers\Res\System\BranchTypeController as Controller;
use App\Http\Requests\Ajax\System\BranchType\{
    AmendRequest,
};
use App\Tasks\Ajax\System\BranchType\AmendTask;
use App\Transformer\RelatedResources\System\BranchTypeRelatedResource;

class BranchTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\System\BranchType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new BranchTypeRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
