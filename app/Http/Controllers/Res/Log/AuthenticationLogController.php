<?php

namespace App\Http\Controllers\Res\Log;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Res\Log\AuthenticationLog\{
    IndexRequest,
    ShowRequest,
    DestroyRequest,
};
use App\Tasks\Res\Log\AuthenticationLog\DestroyTask;
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
                    $this->buildWhere()
                        ->with($request)
                        ->index('user')->mode('id')
                        ->index('state')->mode('boolean')
                        ->done()
                )->paginate($request->query('count'))
            )
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Log\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, $id)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(AuthenticationLog::findOrFail($id))
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Log\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
