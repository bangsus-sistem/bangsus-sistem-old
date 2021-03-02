<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Role\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
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
            new RoleSingleCollection(Role::isNotHidden()->isNotActive()->all()),
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
        $role = new Role;
        $role->code = $request->input('code');
        $role->name = $request->input('name');
        $role->active = true;
        $role->locked = false;
        $role->all_access = false;
        $role->note = $request->input('note');
        $role->save();

        foreach ($request->input('feature_ids') as $featureId) {
            $roleFeature = new RoleFeature;
            $roleFeature->role_id = $role->id;
            $roleFeature->feature_id = $featureId;
            $roleFeature->access = true;
            $roleFeature->save();
        }

        return response()->json(
            new RoleRelatedResource($role),
            201
        );
    }
}
