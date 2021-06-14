<?php

namespace App\Http\Controllers\Ajax\Hrm;

use App\Http\Controllers\Res\Hrm\BloodTypeController as Controller;
use App\Http\Requests\Ajax\Hrm\BloodType\{
    AmendRequest,
};
use App\Tasks\Ajax\Hrm\BloodType\AmendTask;
use App\Transformer\RelatedResources\Hrm\BloodTypeRelatedResource;

class BloodTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\BloodType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new BloodTypeRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
