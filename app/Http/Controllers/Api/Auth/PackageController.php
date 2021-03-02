<?php

namespace App\Http\Controllers\Api\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Package\{
    IndexRequest,
    ShowRequest,
};
use App\Database\Models\Auth\Package;
use App\Transformers\SingleCollections\Auth\PackageSingleCollection;
use App\Transformers\PaginatedCollections\Auth\PackagePaginatedCollection;
use App\Transformers\RelatedResources\Auth\PackageRelatedResource;

class PackageController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new PackageSingleCollection(Package::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Package\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new PackagePaginatedCollection(
                Package::where(
                    $this->buildWhere()
                        ->index('ref')->mode('string')
                        ->index('name')->mode('string')
                        ->done()
                )->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Package\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new PackageRelatedResource(Package::findOrFail($id)),
            200
        );
    }
}
