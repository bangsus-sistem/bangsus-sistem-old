<?php

namespace App\Http\Controllers\Res\Hrm;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Hrm\AttendanceType\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};
use App\Tasks\Res\Hrm\AttendanceType\{
    StoreTask,
    ReviseActivationTask,
    DestroyTask,
};
use App\Models\Hrm\AttendanceType;
use App\Transformer\SingleCollections\Hrm\AttendanceTypeSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\AttendanceTypePaginatedCollection;
use App\Transformer\RelatedResources\Hrm\AttendanceTypeRelatedResource;

class AttendanceTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new AttendanceTypeSingleCollection(AttendanceType::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new AttendanceTypePaginatedCollection(
                AttendanceType::where(
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
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new AttendanceTypeRelatedResource(AttendanceType::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new AttendanceTypeRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new AttendanceTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, true)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            new AttendanceTypeRelatedResource(
                $this->transmit(new ReviseActivationTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\AttendanceType\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
