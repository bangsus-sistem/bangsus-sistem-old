<?php

use Illuminate\Support\Facades\Route;
    
// Route with API auth middleware.
Route::middleware('auth.api')->group(function () {

    /**
     * @package \App\Http\Controllers\Api\Master
     */
    Route::prefix('master')->namespace('Master')->group(base_path('routes/api/master.php'));

    /**
     * @package \App\Http\Controllers\Ajax\Hrm
     */
    Route::prefix('hrm')->namespace('Hrm')->group(base_path('routes/ajax/hrm.php'));
});
