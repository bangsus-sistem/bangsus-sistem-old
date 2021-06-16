<?php

namespace App\Http\Controllers\Res\Hrm;

use App\Foundation\Http\Controller;
use App\Http\Requests\Res\Hrm\Employee\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseAdmissionRequest,
    DestroyRequest,
};
use App\Tasks\Res\Hrm\Employee\{
    StoreTask,
    ReviseAdmissionTask,
    DestroyTask,
};
use App\Models\Hrm\Employee;
use App\Transformer\SingleCollections\Hrm\EmployeeSingleCollection;
use App\Transformer\PaginatedCollections\Hrm\EmployeePaginatedCollection;
use App\Transformer\RelatedResources\Hrm\EmployeeRelatedResource;

class EmployeeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new EmployeeSingleCollection(Employee::all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new EmployeePaginatedCollection(
                Employee::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('nik')->mode('string')
                        ->index('full_name')->mode('string')
                        ->index('gender_id')->mode('id')
                        ->index('active')->mode('boolean')
                        ->index('admitted')->mode('boolean')
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
     * @param  \App\Http\Requests\Res\Hrm\Employee\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new EmployeeRelatedResource(Employee::findOrFail($id)),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\ShowRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            new EmployeeRelatedResource($this->transmit(new StoreTask, $request)),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\ReviseAdmissionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseAdmissionRequest $request)
    {
        return response()->json(
            new EmployeeRelatedResource(
                $this->transmit(new ReviseAdmissionTask, $request)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\ReviseAdmissionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseAdmissionRequest $request)
    {
        return response()->json(
            new EmployeeRelatedResource(
                $this->transmit(new ReviseAdmissionTask, $request, false)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(new DestroyTask, $request);
        return response()->noContent();
    }
}
