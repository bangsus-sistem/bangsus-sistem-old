<?php

namespace App\Http\Controllers\Api\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\WidgetType\{
    IndexRequest,
    ShowRequest,
};
use App\Database\Models\Auth\WidgetType;
use App\Transformers\SingleCollections\Auth\WidgetTypeSingleCollection;
use App\Transformers\PaginatedCollections\Auth\WidgetTypePaginatedCollection;
use App\Transformers\RelatedResources\Auth\WidgetTypeRelatedResource;

class WidgetTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new WidgetTypeSingleCollection(WidgetType::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\WidgetType\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new WidgetTypePaginatedCollection(
                WidgetType::where(
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
     * @param  \App\Http\Requests\Res\Auth\WidgetType\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new WidgetTypeRelatedResource(WidgetType::findOrFail($id)),
            200
        );
    }
}
