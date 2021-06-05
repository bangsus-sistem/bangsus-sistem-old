<?php

namespace App\Http\Controllers\Ajax\Hrm;

use App\Http\Controllers\Res\Hrm\ContactTypeController as Controller;
use App\Http\Requests\Ajax\Hrm\ContactType\{
    AmendRequest,
};
use App\Tasks\Ajax\Hrm\ContactType\AmendTask;
use App\Transformer\RelatedResources\Hrm\ContactTypeRelatedResource;

class ContactTypeController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ContactType\AmendRequest  $request
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
