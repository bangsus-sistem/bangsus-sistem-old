<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Http\Controllers\Res\Auth\RoleController as Controller;
use App\Http\Requests\Ajax\Auth\Role\{
    AmendRequest,
};
use App\Tasks\Ajax\Auth\Role\AmendTask;
use App\Transformer\RelatedResources\Auth\RoleRelatedResource;

class RoleController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Auth\Role\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new RoleRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
