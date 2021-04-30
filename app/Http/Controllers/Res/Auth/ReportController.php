<?php

namespace App\Http\Controllers\Res\Auth;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Res\Auth\Report\{
    IndexRequest,
    ShowRequest,
};
use App\Models\Auth\Report;
use App\Transformer\SingleCollections\Auth\ReportSingleCollection;
use App\Transformer\PaginatedCollections\Auth\ReportPaginatedCollection;
use App\Transformer\RelatedResources\Auth\ReportRelatedResource;

class ReportController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            new ReportSingleCollection(Report::all()),
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
            new ReportPaginatedCollection(
                Report::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('package_id')->mode('id')
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
            new ReportRelatedResource(Report::findOrFail($id))
        );
    }
}
