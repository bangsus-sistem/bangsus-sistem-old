<?php

namespace App\Http\Controllers\Ajax\Logs;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Logs\AuthenticationLog\{
    IndexRequest,
    ShowRequest,
    DestroyRequest,
};
use App\Http\Jobs\Logs\AuthenticationLog\DestroyJob;
use App\Database\Models\Logs\AuthenticationLog;
use App\Transformers\SingleCollections\Logs\AuthenticationLogSingleCollection;
use App\Transformers\PaginatedCollections\Logs\AuthenticationLogPaginatedCollection;
use App\Transformers\RelatedResources\Logs\AuthenticationLogRelatedResource;

class AuthenticationLogController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new AuthenticationLogSingleCollection(AuthenticationLog::isNotHidden()->isActive()->all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new AuthenticationLogPaginatedCollection(
                AuthenticationLog::where(
                    $this->buildWhere()
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->index('locked')->mode('boolean')
                        ->index('all_access')->mode('boolean')
                        ->done()
                )
                    ->isNotHidden()
                    ->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(AuthenticationLog::isNotHidden()->findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        return response()->json(
            $this->dispatch(new DestroyJob, $request),
            204
        );
    }
}
