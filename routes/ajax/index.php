<?php

use Illuminate\Support\Facades\Route;

// Route with none auth guard.
Route::group(base_path('routes/ajax/misc.php'));

// Route with sanctum auth middleware.
Route::middleware('auth:sanctum')->group(function () {

    /**
     * @package \App\Http\Controllers\Ajax\Auth
     */
    Route::prefix('auth')->namespace('Auth')->group(base_path('routes/ajax/auth.php'));

    /**
     * @package \App\Http\Controllers\Ajax\Logs
     */
    Route::prefix('logs')->namespace('Logs')->group(base_path('routes/ajax/logs.php'));
});
