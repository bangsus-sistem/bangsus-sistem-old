<?php

use Illuminate\Support\Facades\Route;

// Route with sanctum auth middleware.
Route::middleware('auth:sanctum')->group(function () {

    /**
     * @package \App\Http\Controllers\Ajax\Master
     */
    Route::prefix('master')->namespace('Master')->group(base_path('routes/ajax/master.php'));

    /**
     * @package \App\Http\Controllers\Ajax\Hrm
     */
    Route::prefix('hrm')->namespace('Hrm')->group(base_path('routes/ajax/hrm.php'));
});
