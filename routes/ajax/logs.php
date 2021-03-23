<?php

use Illuminate\Support\Facades\Route;

Route::prefix('authentication_log')->group(function () {
    Route::get('all', 'AuthenticationLogController@manifest');
    Route::get('', 'AuthenticationLogController@index');
    Route::get('{id}', 'AuthenticationLogController@show');
    Route::post('logout', 'AuthenticationLogController@storeLogout');
    Route::delete('', 'AuthenticationLogController@destroy');
    Route::prefix('widget')->group(function () {
        Route::get('traffic', 'AuthenticationLogController@revealTraffic');
        Route::get('latest_data', 'AuthenticationLogController@revealLatestData');
    });
});

Route::prefix('feature_log')->group(function () {
    Route::get('all', 'FeatureLogController@manifest');
    Route::get('', 'FeatureLogController@index');
    Route::get('{id}', 'FeatureLogController@show');
    Route::post('logout', 'FeatureLogController@storeLogout');
    Route::delete('', 'FeatureLogController@destroy');
    Route::prefix('widget')->group(function () {
        Route::get('traffic', 'FeatureLogController@revealTraffic');
        Route::get('latest_data', 'FeatureLogController@revealLatestData');
    });
});
