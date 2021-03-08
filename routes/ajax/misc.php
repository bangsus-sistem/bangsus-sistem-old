<?php

use Illuminate\Support\Facades\Route;

Route::prefix('logs/authentication_log')->group(function () {
    Route::post('login', 'Logs\AuthenticationLogController@storeLogin');
    Route::post('token', 'Logs\AuthenticationLogController@storeToken');
});
