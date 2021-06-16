<?php

use Illuminate\Support\Facades\Route;

Route::prefix('image')->group(function () {
    Route::get('', 'ImageController@index');
    Route::get('{id}', 'ImageController@show');
    Route::post('', 'ImageController@store');
    Route::delete('', 'ImageController@destroy');
});

Route::prefix('file')->group(function () {
    Route::get('', 'FileController@index');
    Route::get('{id}', 'FileController@show');
    Route::post('', 'FileController@store');
    Route::delete('', 'FileController@destroy');
});
