<?php

namespace App\Http\Controllers\Api\Logs;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Logs\FeatureLog\{
    IndexRequest,
    ShowRequest,
    DestroyRequest,
    RevealTrafficRequest,
    RevealLatestDataRequest,
};
use App\Http\Jobs\Logs\FeatureLog\DestroyJob;
use App\Widgets\Logs\FeatureLog\{
    TrafficWidget,
    LatestDataWidget,
};
use App\Database\Models\Logs\FeatureLog;
use App\Transformers\SingleCollections\Logs\FeatureLogSingleCollection;
use App\Transformers\PaginatedCollections\Logs\FeatureLogPaginatedCollection;
use App\Transformers\RelatedResources\Logs\FeatureLogRelatedResource;

class FeatureLogController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new FeatureLogSingleCollection(FeatureLog::isNotHidden()->isActive()->all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\FeatureLog\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new FeatureLogPaginatedCollection(
                FeatureLog::where(
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
     * @param  \App\Http\Requests\Res\Logs\FeatureLog\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new FeatureLogRelatedResource(FeatureLog::isNotHidden()->findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\FeatureLog\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        return response()->json(
            $this->dispatch(new DestroyJob, $request),
            204
        );
    }

    /**
     * @param  \App\Http\Request\Res\Logs\FeatureLog\RevealTrafficRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealTraffic(RevealTrafficRequest $request)
    {
        return response()
            ->json($this->reveal(new TrafficWidget, $request), 200);
    }

    /**
     * @param  \App\Http\Request\Res\Logs\FeatureLog\RevealLatestDataRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealLatestData(RevealLatestDataRequest $request)
    {
        return response()
            ->json($this->reveal(new LatestDataWidget, $request), 200);
    }
}
