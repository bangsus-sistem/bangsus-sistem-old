<?php

namespace App\Http\Controllers\Api\System;

use App\Http\Controllers\Res\System\BranchTypeController as Controller;
use App\Http\Requests\Api\System\BranchType\{
    AmendRequest,
};
use App\Tasks\Api\System\BranchType\AmendTask;
use App\Transformer\RelatedResources\System\BranchTypeRelatedResource;

class BranchTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\System\BranchType\AmendRequest  $request
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
