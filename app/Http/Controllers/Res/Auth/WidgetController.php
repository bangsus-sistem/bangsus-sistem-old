<?php

namespace App\Http\Controllers\Res\Auth;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Res\Auth\Widget\{
    IndexRequest,
    ShowRequest,
};
use App\Models\Auth\Widget;
use App\Transformer\SingleCollections\Auth\WidgetSingleCollection;
use App\Transformer\PaginatedCollections\Auth\WidgetPaginatedCollection;
use App\Transformer\RelatedResources\Auth\WidgetRelatedResource;

class WidgetController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new WidgetSingleCollection(Widget::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\IndexRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new WidgetPaginatedCollection(
                Widget::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('package_id')->mode('id')
                        ->index('ref')->mode('string')
                        ->index('name')->mode('string')
                        ->done()
                )->paginate($request->query('count'))
            )
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new WidgetRelatedResource(Widget::findOrFail($id))
        );
    }
}
