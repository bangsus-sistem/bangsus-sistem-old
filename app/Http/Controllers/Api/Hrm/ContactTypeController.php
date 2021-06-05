<?php

namespace App\Http\Controllers\Api\Hrm;

use App\Http\Controllers\Res\Hrm\ContactTypeController as Controller;
use App\Http\Requests\Api\Hrm\ContactType\{
    AmendRequest,
};
use App\Tasks\Api\Hrm\ContactType\AmendTask;
use App\Transformer\RelatedResources\Hrm\ContactTypeRelatedResource;

class ContactTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\ContactType\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new ContactTypeRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
