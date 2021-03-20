<?php

namespace App\Http\Controllers\Ajax\Utils;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use App\Database\Models\Auth\{
    Feature,
    Widget,
};

class AuthorizationController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $role = $request->user()->role;
        $features = $role->all_access
            ?   Feature::with('action', 'module')->get()
            :   Feature::whereHas('roleFeatures',
                    function ($query) use ($role) {
                        $query->where('role_id', $role->id);
                    }
                )
                    ->with('action', 'module')
                    ->get();
        $widgets = $role->all_access
            ?   Widget::with('widgetType', 'module')->get()
            :   Widget::whereHas('roleWidgets',
                    function ($query) use ($role) {
                        $query->where('role_id', $role->id);
                    }
                )
                    ->with('widgetType', 'module')
                    ->get();
        return response()->json([
            'features' => $features,
            'widgets' => $widgets,
        ]);
    }
}
