<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->namespace('Auth')->group(base_path('routes/ajax/auth.php'));
