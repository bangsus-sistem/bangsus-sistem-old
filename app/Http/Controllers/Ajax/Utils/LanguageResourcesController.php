<?php

namespace App\Http\Controllers\Ajax\Utils;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;

class LanguageResourcesController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json(trans('spa'));
    }
}
