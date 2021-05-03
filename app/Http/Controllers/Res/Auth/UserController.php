<?php

namespace App\Http\Controllers\Res\Auth;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Auth\User\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    RevisePasswordRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\Auth\User\{
    StoreTask,
    RevisePasswordTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\Auth\User;
use App\Transformer\SingleCollections\Auth\UserSingleCollection;
use App\Transformer\PaginatedCollections\Auth\UserPaginatedCollection;
use App\Transformer\RelatedResources\Auth\UserRelatedResource;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new UserSingleCollection(User::all()),
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
                        ->with($request)
                        ->index('username')->mode('string')
                        ->index('full_name')->mode('string')
                        ->index('role_id')->mode('id')
                        ->index('active')->mode('boolean')
                        ->index('all_branches')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
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
            new UserRelatedResource(User::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\User\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new UserRelatedResource($this->transmit(new StoreTask, $request)),
            201
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
                $this->transmit(new RevisePasswordTask, $request, true)
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
                $this->transmit(new ReviseActivationTask, $request, true)
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
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\User\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
