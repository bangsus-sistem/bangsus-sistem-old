<?php

use Illuminate\Support\Facades\Route;

Route::prefix('package')->group(function () {
    Route::get('all', 'PackageController@manifest');
    Route::get('', 'PackageController@index');
    Route::get('{id}', 'PackageController@show');
});

Route::prefix('module')->group(function () {
    Route::get('all', 'ModuleController@manifest');
    Route::get('', 'ModuleController@index');
    Route::get('{id}', 'ModuleController@show');
});

Route::prefix('action')->group(function () {
    Route::get('all', 'ActionController@manifest');
    Route::get('', 'ActionController@index');
    Route::get('{id}', 'ActionController@show');
});

Route::prefix('feature')->group(function () {
    Route::get('all', 'FeatureController@manifest');
    Route::get('', 'FeatureController@index');
    Route::get('{id}', 'FeatureController@show');
});
