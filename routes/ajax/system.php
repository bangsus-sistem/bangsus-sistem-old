<?php

use Illuminate\Support\Facades\Route;

Route::prefix('branch_type')->group(function () {
    Route::get('all', 'BranchTypeController@manifest');
    Route::get('', 'BranchTypeController@index');
    Route::get('{id}', 'BranchTypeController@show');
    Route::post('', 'BranchTypeController@store');
    Route::put('', 'BranchTypeController@amend');
    Route::patch('activate', 'BranchTypeController@reviseActivate');
    Route::patch('deactivate', 'BranchTypeController@reviseDeactivate');
    Route::delete('', 'BranchTypeController@destroy');
});
