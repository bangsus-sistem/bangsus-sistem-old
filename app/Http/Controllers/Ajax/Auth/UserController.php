<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\User\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    RevisePasswordRequest,
    ReviseActivationRequest,
};
use App\Http\Jobs\Auth\User\{
    StoreJob,
    AmendJob,
    RevisePasswordJob,
    ReviseActivationJob,
};
use App\Database\Models\Auth\User;
use App\Transformers\SingleCollections\Auth\UserSingleCollection;
use App\Transformers\PaginatedCollections\Auth\UserPaginatedCollection;
use App\Transformers\RelatedResources\Auth\UserRelatedResource;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new UserSingleCollection(User::isNotHidden()->isActive()->all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\User\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new UserPaginatedCollection(
                User::where(
                    $this->buildWhere()
                        ->index('username')->mode('string')
                        ->index('full_name')->mode('string')
                        ->index('role_id')->mode('id')
                        ->index('active')->mode('boolean')
                        ->index('locked')->mode('boolean')
                        ->done()
                )
                    ->isNotHidden()
                    ->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\User\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new UserRelatedResource(User::isNotHidden()->findOrFail($id)),
            200
        );
    }
    
    /**
     * @param  \App\Http\Requests\Res\Auth\User\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->dispatch(new StoreJob, $request)
            ),
            201
        );
    }
    
    /**
     * @param  \App\Http\Requests\Res\Auth\User\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->dispatch(new AmendJob, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\User\RevisePasswordRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revisePassword(RevisePasswordRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->dispatch(new RevisePasswordJob, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\User\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->dispatch(new ReviseActivationJob, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\User\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new UserRelatedResource(
                $this->dispatch(new ReviseActivationJob, $request, false)
            ),
            200
        );
    }
}
