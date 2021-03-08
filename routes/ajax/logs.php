<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication_log')->group(function () {
    Route::get('all', 'AuthenticationLogController@manifest');
    Route::get('', 'AuthenticationLogController@index');
    Route::get('{id}', 'AuthenticationLogController@show');
    Route::post('logout', 'AuthenticationLogController@storeLogout');
    Route::delete('', 'AuthenticationLogController@destroy');
});
