<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Res\Auth\UserController as Controller;
use App\Http\Requests\Api\Auth\User\{
    AmendRequest,
};
use App\Tasks\Api\Auth\User\AmendTask;
use App\Transformer\RelatedResources\Auth\UserRelatedResource;

class UserController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Auth\User\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new UserRelatedResource($this->transmit(new AmendTask, $request)),
            200
        );
    }
}
