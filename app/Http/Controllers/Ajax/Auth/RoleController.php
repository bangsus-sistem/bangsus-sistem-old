<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Role\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Http\Jobs\Auth\Role\{
    StoreJob,
    AmendJob,
    ReviseActivationJob,
    DestroyJob,
};
use App\Database\Models\Auth\Role;
use App\Transformers\SingleCollections\Auth\RoleSingleCollection;
use App\Transformers\PaginatedCollections\Auth\RolePaginatedCollection;
use App\Transformers\RelatedResources\Auth\RoleRelatedResource;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new RoleSingleCollection(Role::isNotHidden()->isActive()->all()),
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
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->index('locked')->mode('boolean')
                        ->index('all_access')->mode('boolean')
                        ->done()
                )
                    ->isNotHidden()
                    ->get()
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
            new RoleRelatedResource(Role::isNotHidden()->findOrFail($id)),
            200
        );
    }
    
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new RoleRelatedResource(
                $this->dispatch(new StoreJob, $request)
            ),
            201
        );
    }
    
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            new RoleRelatedResource(
                $this->dispatch(new AmendJob, $request)
            ),
            200
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
                $this->dispatch(new ReviseActivationJob, $request, true)
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
                $this->dispatch(new ReviseActivationJob, $request, false)
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
        return response()->json(
            $this->dispatch(new DestroyJob, $request),
            204
        );
    }
}
