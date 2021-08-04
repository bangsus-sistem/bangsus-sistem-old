<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Res\Master\ProductController as Controller;
use App\Http\Requests\Api\Master\Product\AmendRequest;

class ProductController extends Controller
{
    /**
     * @param  \App\Http\Requests\Api\Master\Product\AmendRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function amend(AmendRequest $request)
    {
        return response()->json(
            wbcm_related_resource(
                'master.product',
                true,
                $this->transmit(wbcm_task('api.master.product.amend'), $request)
            ),
            200
        );
    }
}
