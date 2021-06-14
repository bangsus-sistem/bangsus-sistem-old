<?php

namespace App\Http\Controllers\Res\Hrm;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Hrm\BloodType\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\Hrm\BloodType\{
    StoreTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\Hrm\BloodType;
use App\Transformer\SingleCollections\Hrm\BloodTypeSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\BloodTypePaginatedCollection;
use App\Transformer\RelatedResources\Hrm\BloodTypeRelatedResource;

class BloodTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new BloodTypeSingleCollection(BloodType::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new BloodTypePaginatedCollection(
                BloodType::where(
                    $this->buildWhere()
                        ->with($request)
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
     * @param  \App\Http\Requests\Res\Hrm\BloodType\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new BloodTypeRelatedResource(BloodType::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new BloodTypeRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BloodTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new BloodTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
