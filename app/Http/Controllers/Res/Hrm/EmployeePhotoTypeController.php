<?php

namespace App\Http\Controllers\Res\Hrm;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Hrm\EmployeePhotoType\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\Hrm\EmployeePhotoType\{
    StoreTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\Hrm\EmployeePhotoType;
use App\Transformer\SingleCollections\Hrm\EmployeePhotoTypeSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\EmployeePhotoTypePaginatedCollection;
use App\Transformer\RelatedResources\Hrm\EmployeePhotoTypeRelatedResource;

class EmployeePhotoTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new EmployeePhotoTypeSingleCollection(EmployeePhotoType::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypePaginatedCollection(
                EmployeePhotoType::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->index('required')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(EmployeePhotoType::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new EmployeePhotoTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\EmployeePhotoType\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
