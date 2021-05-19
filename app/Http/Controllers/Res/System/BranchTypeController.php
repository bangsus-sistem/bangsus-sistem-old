<?php

namespace App\Http\Controllers\Res\System;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\System\BranchType\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\System\BranchType\{
    StoreTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\System\BranchType;
use App\Transformer\SingleCollections\System\BranchTypeSingleCollection;
use App\Transformer\PaginatedCollections\System\BranchTypePaginatedCollection;
use App\Transformer\RelatedResources\System\BranchTypeRelatedResource;

class BranchTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new BranchTypeSingleCollection(BranchType::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\BranchType\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new BranchTypePaginatedCollection(
                BranchType::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\BranchType\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new BranchTypeRelatedResource(BranchType::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\BranchType\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new BranchTypeRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\BranchType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BranchTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\BranchType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BranchTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\BranchType\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
