<?php

namespace App\Http\Controllers\Res\Auth;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Res\Auth\Feature\{
    IndexRequest,
    ShowRequest,
};
use App\Models\Auth\Feature;
use App\Transformer\SingleCollections\Auth\FeatureSingleCollection;
use App\Transformer\PaginatedCollections\Auth\FeaturePaginatedCollection;
use App\Transformer\RelatedResources\Auth\FeatureRelatedResource;

class FeatureController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new FeatureSingleCollection(Feature::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new FeaturePaginatedCollection(
                Feature::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('module_id')->mode('id')
                        ->index('action_id')->mode('id')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            )
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new FeatureRelatedResource(Feature::findOrFail($id))
        );
    }
}
