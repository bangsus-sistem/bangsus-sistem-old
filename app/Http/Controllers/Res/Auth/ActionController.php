<?php

namespace App\Http\Controllers\Res\Auth;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Res\Auth\Action\{
    IndexRequest,
    ShowRequest,
};
use App\Models\Auth\Action;
use App\Transformer\SingleCollections\Auth\ActionSingleCollection;
use App\Transformer\PaginatedCollections\Auth\ActionPaginatedCollection;
use App\Transformer\RelatedResources\Auth\ActionRelatedResource;

class ActionController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new ActionSingleCollection(Action::all()),
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
            new ActionPaginatedCollection(
                Action::where(
                    $this->buildWhere($request)
                        ->with($request)
                        ->index('ref')->mode('string')
                        ->index('name')->mode('string')
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
            new ActionRelatedResource(Action::findOrFail($id))
        );
    }
}
