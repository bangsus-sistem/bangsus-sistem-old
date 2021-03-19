<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Widget\{
    IndexRequest,
    ShowRequest,
};
use App\Database\Models\Auth\Widget;
use App\Transformers\SingleCollections\Auth\WidgetSingleCollection;
use App\Transformers\PaginatedCollections\Auth\WidgetPaginatedCollection;
use App\Transformers\RelatedResources\Auth\WidgetRelatedResource;

class WidgetController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new WidgetSingleCollection(Widget::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Widget\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new WidgetPaginatedCollection(
                Widget::where(
                    $this->buildWhere()
                        ->index('module_id')->mode('id')
                        ->index('widget_type_id')->mode('id')
                        ->done()
                )->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Widget\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new WidgetRelatedResource(Widget::findOrFail($id)),
            200
        );
    }
}
