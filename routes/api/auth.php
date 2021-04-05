<?php

use Illuminate\Support\Facades\Route;

Route::prefix('package')->group(function () {
    Route::get('all', 'PackageController@manifest');
    Route::get('', 'PackageController@index');
    Route::get('{id}', 'PackageController@show');
});
