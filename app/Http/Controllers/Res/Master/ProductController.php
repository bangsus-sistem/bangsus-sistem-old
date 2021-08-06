<?php

namespace App\Http\Controllers\Res\Master;

use Waffleboss\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Res\Master\Product\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    ReviseActivationRequest,
    DestroyRequest,
};

class ProductController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest(Request $request)
    {
        return response()->json(
            wbcm_single_collection(
                'master.product',
                true,
                wbcm_model('master.product')::all()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Master\Product\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            wbcm_paginated_collection(
                'master.product',
                true,
                wbcm_model('master.product')::where(
                    $this->buildWhere()
                        ->with($request)
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('product_type_id')->mode('id')
                        ->index('product_category_id')->mode('id')
                        ->index('unit_id')->mode('id')
                        ->index('active')->mode('boolean')
                        ->index('locked')->mode('boolean')
                        ->index('monitor_stock')->mode('boolean')
                        ->index('all_branches')->mode('boolean')
                        ->done()
                )
                    ->orderBy($request->input('sort'), $request->input('order'))
                    ->paginate($request->input('count'))
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Master\Product\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            wbcm_related_resource(
                'master.product',
                true,
                wbcm_model('master.product')::findOrFail($id)
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Master\Product\StoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        return response()->json(
            wbcm_related_resource(
                'master.product',
                true,
                $this->transmit(wbcm_task('res.master.product.store'), $request),
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Master\Product\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseActivate(ReviseActivationRequest $request)
    {
        return response()->json(
            wbcm_related_resource(
                'master.product',
                true,
                $this->transmit(
                    wbcm_task('res.master.product.revise_activation'),
                    $request,
                    true,
                ),
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Master\Product\ReviseActivationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reviseDeactivate(ReviseActivationRequest $request)
    {
        return response()->json(
            wbcm_related_resource(
                'master.product',
                true,
                $this->transmit(
                    wbcm_task('res.master.product.revise_activation'),
                    $request,
                    false,
                ),
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Master\Product\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        $this->transmit(wbcm_task('res.master.product.destroy'), $request);
        return response()->noContent();
    }
}
