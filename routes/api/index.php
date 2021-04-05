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
});
