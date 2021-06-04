<?php

namespace App\Http\Controllers\Ajax\Master;

use App\Http\Controllers\Res\Master\UnitController as Controller;
use App\Http\Requests\Ajax\Master\Unit\{
    AmendRequest,
};
use App\Tasks\Ajax\Master\Unit\AmendTask;
use App\Transformer\RelatedResources\Master\UnitRelatedResource;

class UnitController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Master\Unit\AmendRequest  $request
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
