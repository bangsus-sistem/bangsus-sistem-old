<?php

namespace App\Http\Controllers\Api\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Feature\{
    IndexRequest,
    ShowRequest,
};
use App\Database\Models\Auth\Feature;
use App\Transformers\SingleCollections\Auth\FeatureSingleCollection;
use App\Transformers\PaginatedCollections\Auth\FeaturePaginatedCollection;
use App\Transformers\RelatedResources\Auth\FeatureRelatedResource;

class FeatureController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new FeatureSingleCollection(Feature::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Feature\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new FeaturePaginatedCollection(
                Feature::where(
                    $this->buildWhere()
                        ->index('module_id')->mode('id')
                        ->index('action_id')->mode('id')
                        ->done()
                )
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Feature\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new FeatureRelatedResource(Feature::findOrFail($id)),
            200
        );
    }
}
