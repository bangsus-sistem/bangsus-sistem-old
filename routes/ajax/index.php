<?php

use Illuminate\Support\Facades\Route;

// Route with none auth guard.
Route::prefix('')->group(base_path('routes/ajax/misc.php'));

/**
 * @package \App\Http\Controllers\Ajax\Utils
 */
Route::prefix('utils')->namespace('Utils')->group(base_path('routes/ajax/utils.php'));

// Route with sanctum auth middleware.
Route::middleware('auth:sanctum')->group(function () {

    /**
     * @package \App\Http\Controllers\Ajax\Auth
     */
    Route::prefix('auth')->namespace('Auth')->group(base_path('routes/ajax/auth.php'));

    /**
     * @package \App\Http\Controllers\Ajax\Logs
     */
    Route::prefix('log')->namespace('Log')->group(base_path('routes/ajax/log.php'));

    /**
     * @package \App\Http\Controllers\Ajax\System
     */
    Route::prefix('system')->namespace('System')->group(base_path('routes/ajax/system.php'));

    /**
     * @package \App\Http\Controllers\Ajax\Master
     */
    Route::prefix('master')->namespace('Master')->group(base_path('routes/ajax/master.php'));

    /**
     * @package \App\Http\Controllers\Ajax\Hrm
     */
    Route::prefix('hrm')->namespace('Hrm')->group(base_path('routes/ajax/hrm.php'));
});
