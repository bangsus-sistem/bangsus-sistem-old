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

Route::prefix('role')->group(function () {
    Route::get('all', 'RoleController@manifest');
    Route::get('', 'RoleController@index');
    Route::get('{id}', 'RoleController@show');
    Route::post('', 'RoleController@store');
    Route::put('', 'RoleController@amend');
    Route::patch('activate', 'RoleController@reviseActivate');
    Route::patch('deactivate', 'RoleController@reviseDeactivate');
    Route::delete('', 'RoleController@destroy');
});

Route::prefix('user')->group(function () {
    Route::get('all', 'UserController@manifest');
    Route::get('', 'UserController@index');
    Route::get('{id}', 'UserController@show');
    Route::post('', 'UserController@store');
    Route::put('', 'UserController@amend');
    Route::patch('activate', 'UserController@reviseActivate');
    Route::patch('deactivate', 'UserController@reviseDeactivate');
    Route::patch('password', 'UserController@revisePassword');
});
