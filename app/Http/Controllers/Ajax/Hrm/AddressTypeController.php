<?php

namespace App\Http\Controllers\Ajax\Hrm;

use App\Http\Controllers\Res\Hrm\AddressTypeController as Controller;
use App\Http\Requests\Ajax\Hrm\AddressType\{
    AmendRequest,
};
use App\Tasks\Ajax\Hrm\AddressType\AmendTask;
use App\Transformer\RelatedResources\Hrm\AddressTypeRelatedResource;

class AddressTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\AddressType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new AddressTypeRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
