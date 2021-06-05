<?php

use Illuminate\Support\Facades\Route;

Route::prefix('contact_type')->group(function () {
    Route::get('all', 'ContactTypeController@manifest');
    Route::get('', 'ContactTypeController@index');
    Route::get('{id}', 'ContactTypeController@show');
    Route::post('', 'ContactTypeController@store');
    Route::put('', 'ContactTypeController@amend');
    Route::patch('activate', 'ContactTypeController@reviseActivate');
    Route::patch('deactivate', 'ContactTypeController@reviseDeactivate');
    Route::delete('', 'ContactTypeController@destroy');
});

Route::prefix('address_type')->group(function () {
    Route::get('all', 'AddressTypeController@manifest');
    Route::get('', 'AddressTypeController@index');
    Route::get('{id}', 'AddressTypeController@show');
    Route::post('', 'AddressTypeController@store');
    Route::put('', 'AddressTypeController@amend');
    Route::patch('activate', 'AddressTypeController@reviseActivate');
    Route::patch('deactivate', 'AddressTypeController@reviseDeactivate');
    Route::delete('', 'AddressTypeController@destroy');
});

Route::prefix('employee_photo_type')->group(function () {
    Route::get('all', 'EmployeePhotoTypeController@manifest');
    Route::get('', 'EmployeePhotoTypeController@index');
    Route::get('{id}', 'EmployeePhotoTypeController@show');
    Route::post('', 'EmployeePhotoTypeController@store');
    Route::put('', 'EmployeePhotoTypeController@amend');
    Route::patch('activate', 'EmployeePhotoTypeController@reviseActivate');
    Route::patch('deactivate', 'EmployeePhotoTypeController@reviseDeactivate');
    Route::delete('', 'EmployeePhotoTypeController@destroy');
});
