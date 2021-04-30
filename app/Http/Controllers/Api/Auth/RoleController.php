<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Res\Auth\RoleController as Controller;
use App\Http\Requests\Api\Auth\Role\{
    AmendRequest,
};
use App\Tasks\Api\Auth\Role\AmendTask;
use App\Transformer\RelatedResources\Auth\RoleRelatedResource;

class RoleController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Auth\Role\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(Request $request)
    {
        return response()->json(
            new RoleRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
