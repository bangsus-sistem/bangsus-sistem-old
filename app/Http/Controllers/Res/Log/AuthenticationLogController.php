<?php

namespace App\Http\Controllers\Res\Log;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Res\Log\AuthenticationLog\{
    IndexRequest,
    ShowRequest,
};
use App\Models\Log\AuthenticationLog;
use App\Transformer\SingleCollections\Log\AuthenticationLogSingleCollection;
use App\Transformer\PaginatedCollections\Log\AuthenticationLogPaginatedCollection;
use App\Transformer\RelatedResources\Log\AuthenticationLogRelatedResource;

class AuthenticationLogController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new AuthenticationLogSingleCollection(AuthenticationLog::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Log\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new AuthenticationLogPaginatedCollection(
                AuthenticationLog::where(
                    $this->buildWhere($request)
                        ->index('user')->mode('id')
                        ->index('state')->mode('boolean')
                        ->done()
                )->get()
            )
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Log\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(AuthenticationLog::findOrFail($id))
        );
    }
}
