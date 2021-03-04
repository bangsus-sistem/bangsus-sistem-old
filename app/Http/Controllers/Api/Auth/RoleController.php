<?php

namespace App\Http\Controllers\Api\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Role\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ActivationRequest,
    DestroyRequest,
};
use App\Http\Jobs\Auth\Role\{
    StoreJob,
    AmendJob,
    ActivationJob,
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
     * @param  \App\Http\Requests\Res\Auth\Role\ActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ActivationRequest $request)
    {
        return response()->json(
            new RoleRelatedResource(
                $this->dispatch(new ActivationJob, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Role\ActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ActivationRequest $request)
    {
        return response()->json(
            new RoleRelatedResource(
                $this->dispatch(new ActivationJob, $request, false)
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
