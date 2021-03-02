<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Auth\Action\{
    IndexRequest,
    ShowRequest,
};
use App\Database\Models\Auth\Action;
use App\Transformers\SingleCollections\Auth\ActionSingleCollection;
use App\Transformers\PaginatedCollections\Auth\ActionPaginatedCollection;
use App\Transformers\RelatedResources\Auth\ActionRelatedResource;

class ActionController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new ActionSingleCollection(Action::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Auth\Action\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new ActionPaginatedCollection(
                Action::where(
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
     * @param  \App\Http\Requests\Res\Auth\Action\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new ActionRelatedResource(Action::findOrFail($id)),
            200
        );
    }
}
