<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Res\Master\UnitController as Controller;
use App\Http\Requests\Api\Master\Unit\{
    AmendRequest,
};
use App\Tasks\Api\Master\Unit\AmendTask;
use App\Transformer\RelatedResources\Master\UnitRelatedResource;

class UnitController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Master\Unit\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new UnitRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
