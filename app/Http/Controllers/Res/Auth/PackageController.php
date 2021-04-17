<?php

namespace App\Http\Controllers\Res\Auth;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Auth\Package\{
    IndexRequest,
    ShowRequest,
};
use App\Models\Auth\Package;
use App\Transformer\SingleCollections\Auth\PackageSingleCollection;
use App\Transformer\PaginatedCollections\Auth\PackagePaginatedCollection;
use App\Transformer\RelatedResources\Auth\PackageRelatedResource;

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
                        ->with($request)
                        ->index('ref')->mode('string')
                        ->index('name')->mode('string')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Package\ShowRequest  $request
     * @param  int  $id
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
