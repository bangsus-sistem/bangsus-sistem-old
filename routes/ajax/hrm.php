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

Route::prefix('attendance_type')->group(function () {
    Route::get('all', 'AttendanceTypeController@manifest');
    Route::get('', 'AttendanceTypeController@index');
    Route::get('{id}', 'AttendanceTypeController@show');
    Route::post('', 'AttendanceTypeController@store');
    Route::put('', 'AttendanceTypeController@amend');
    Route::patch('activate', 'AttendanceTypeController@reviseActivate');
    Route::patch('deactivate', 'AttendanceTypeController@reviseDeactivate');
    Route::delete('', 'AttendanceTypeController@destroy');
});

Route::prefix('division')->group(function () {
    Route::get('all', 'DivisionController@manifest');
    Route::get('', 'DivisionController@index');
    Route::get('{id}', 'DivisionController@show');
    Route::post('', 'DivisionController@store');
    Route::put('', 'DivisionController@amend');
    Route::patch('activate', 'DivisionController@reviseActivate');
    Route::patch('deactivate', 'DivisionController@reviseDeactivate');
    Route::delete('', 'DivisionController@destroy');
});

Route::prefix('job_title')->group(function () {
    Route::get('all', 'JobTitleController@manifest');
    Route::get('', 'JobTitleController@index');
    Route::get('{id}', 'JobTitleController@show');
    Route::post('', 'JobTitleController@store');
    Route::put('', 'JobTitleController@amend');
    Route::patch('activate', 'JobTitleController@reviseActivate');
    Route::patch('deactivate', 'JobTitleController@reviseDeactivate');
    Route::delete('', 'JobTitleController@destroy');
});

Route::prefix('gender')->group(function () {
    Route::get('all', 'GenderController@manifest');
    Route::get('', 'GenderController@index');
    Route::get('{id}', 'GenderController@show');
    Route::post('', 'GenderController@store');
    Route::put('', 'GenderController@amend');
    Route::patch('activate', 'GenderController@reviseActivate');
    Route::patch('deactivate', 'GenderController@reviseDeactivate');
    Route::delete('', 'GenderController@destroy');
});
