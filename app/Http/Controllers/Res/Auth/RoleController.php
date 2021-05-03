<?php

namespace App\Http\Controllers\Res\Auth;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Auth\Role\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\Auth\Role\{
    StoreTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\Auth\Role;
use App\Transformer\SingleCollections\Auth\RoleSingleCollection;
use App\Transformer\PaginatedCollections\Auth\RolePaginatedCollection;
use App\Transformer\RelatedResources\Auth\RoleRelatedResource;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new RoleSingleCollection(Role::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Role\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new RolePaginatedCollection(
                Role::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->index('all_features')->mode('boolean')
                        ->index('all_widgets')->mode('boolean')
                        ->index('all_reports')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Role\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new RoleRelatedResource(Role::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Role\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new RoleRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Role\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new RoleRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Role\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new RoleRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Role\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
