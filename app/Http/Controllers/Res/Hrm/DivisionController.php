<?php

namespace App\Http\Controllers\Res\Hrm;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Hrm\Division\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\Hrm\Division\{
    StoreTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\Hrm\Division;
use App\Transformer\SingleCollections\Hrm\DivisionSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\DivisionPaginatedCollection;
use App\Transformer\RelatedResources\Hrm\DivisionRelatedResource;

class DivisionController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new DivisionSingleCollection(Division::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new DivisionPaginatedCollection(
                Division::where(
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
     * @param  \App\Http\Requests\Res\Hrm\Division\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new DivisionRelatedResource(Division::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new DivisionRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new DivisionRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new DivisionRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
