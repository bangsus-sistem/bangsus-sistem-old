<?php

use Illuminate\Support\Facades\Route;

Route::get('image/{id}', 'ImageController@show')->name('storage.image');
Route::get('file/{id}', 'FileController@show')->name('storage.file');
