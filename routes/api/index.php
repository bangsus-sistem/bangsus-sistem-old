<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.api')->group(function () {
    
    Route::prefix('auth')->namespace('Auth')->group(base_path('routes/api/auth.php'));
});
