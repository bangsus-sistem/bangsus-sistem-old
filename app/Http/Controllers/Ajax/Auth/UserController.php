<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Http\Controllers\Res\Auth\UserController as Controller;
use App\Http\Requests\Ajax\Auth\User\{
    AmendRequest,
};
use App\Tasks\Ajax\Auth\User\AmendTask;
use App\Transformer\RelatedResources\Auth\UserRelatedResource;

class UserController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Auth\User\AmendRequest  $request
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
