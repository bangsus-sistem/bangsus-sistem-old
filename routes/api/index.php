<?php

use Illuminate\Support\Facades\Route;

// Route with none auth guard.
Route::prefix('')->group(base_path('routes/api/misc.php'));
    
// Route with API auth middleware.
Route::middleware('auth.api')->group(function () {

    /**
     * @package \App\Http\Controllers\Api\Auth
     */
    Route::prefix('auth')->namespace('Auth')->group(base_path('routes/api/auth.php'));

    /**
     * @package \App\Http\Controllers\Api\Logs
     */
    Route::prefix('log')->namespace('Log')->group(base_path('routes/api/log.php'));

    /**
     * @package \App\Http\Controllers\Api\System
     */
    Route::prefix('system')->namespace('System')->group(base_path('routes/api/system.php'));

    /**
     * @package \App\Http\Controllers\Api\Master
     */
    Route::prefix('master')->namespace('Master')->group(base_path('routes/api/master.php'));

    /**
     * @package \App\Http\Controllers\Ajax\Hrm
     */
    Route::prefix('hrm')->namespace('Hrm')->group(base_path('routes/ajax/hrm.php'));
});
