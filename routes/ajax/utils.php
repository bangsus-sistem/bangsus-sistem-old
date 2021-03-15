<?php

use Illuminate\Support\Facades\Route;

Route::get('authenticated', 'AuthenticatedController@index');
Route::get('version_check', 'VersionCheckController@index');
