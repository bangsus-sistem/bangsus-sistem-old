<?php

use Illuminate\Support\Facades\Route;

Route::prefix('unit')->group(function () {
    Route::get('all', 'UnitController@manifest');
    Route::get('', 'UnitController@index');
    Route::get('{id}', 'UnitController@show');
    Route::post('', 'UnitController@store');
    Route::put('', 'UnitController@amend');
    Route::patch('activate', 'UnitController@reviseActivate');
    Route::patch('deactivate', 'UnitController@reviseDeactivate');
    Route::delete('', 'UnitController@destroy');
});
