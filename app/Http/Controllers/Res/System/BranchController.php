<?php

namespace App\Http\Controllers\Res\System;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\System\Branch\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\System\Branch\{
    StoreTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\System\Branch;
use App\Transformer\SingleCollections\System\BranchSingleCollection;
use App\Transformer\PaginatedCollections\System\BranchPaginatedCollection;
use App\Transformer\RelatedResources\System\BranchRelatedResource;

class BranchController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new BranchSingleCollection(
                $request->boolean('authorized')
                    ?   Branch::all()
                    :   Branch::userAuthorized()->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\Branch\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new BranchPaginatedCollection(
                Branch::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->done()
                )
                    ->userAuthorized()
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\Branch\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new BranchRelatedResource(Branch::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\Branch\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new BranchRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\Branch\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BranchRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\Branch\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BranchRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\System\Branch\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
