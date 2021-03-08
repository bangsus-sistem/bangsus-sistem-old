<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication_log')->group(function () {
    Route::post('login', 'AuthenticationLogController@storeLogin');
    Route::post('token', 'AuthenticationLogController@storeToken');
});
