<?php

namespace App\Http\Controllers\Api\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Module\{
    IndexRequest,
    ShowRequest,
};
use App\Database\Models\Auth\Module;
use App\Transformers\SingleCollections\Auth\ModuleSingleCollection;
use App\Transformers\PaginatedCollections\Auth\ModulePaginatedCollection;
use App\Transformers\RelatedResources\Auth\ModuleRelatedResource;

class ModuleController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new ModuleSingleCollection(Module::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Module\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new ModulePaginatedCollection(
                Module::where(
                    $this->buildWhere()
                        ->index('package_id')->mode('id')
                        ->index('ref')->mode('string')
                        ->index('name')->mode('string')
                        ->done()
                )->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Module\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new ModuleRelatedResource(Module::findOrFail($id)),
            200
        );
    }
}
