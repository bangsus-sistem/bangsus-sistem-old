<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use App\Database\Models\Auth\Package;
use App\Transformers\SingleCollections\Auth\PackageSingleCollection;

class PackageController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        $packages = Package::all();

        return response()->json(
            new PackageSingleCollection($packages),
            200
        );
    }
}
