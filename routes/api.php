<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

 
Route::group(['prefix' => 'user'], function () {
    Route::post('/', 'App\Http\Controllers\Admin\UserController@store');
    Route::get('/create', 'App\Http\Controllers\Admin\UserController@create');
    Route::get('/{id}/edit', 'App\Http\Controllers\Admin\UserController@edit');
    Route::delete('/{id}', 'App\Http\Controllers\Admin\UserController@destroy');
    Route::get('/{id}', 'App\Http\Controllers\Admin\UserController@show');
    Route::patch('/{id}', 'App\Http\Controllers\Admin\UserController@update');
    Route::get('/', 'App\Http\Controllers\Admin\UserController@index');
});

Route::post('users', 'App\Http\Controllers\Admin\UserController@store');
