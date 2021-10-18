<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/formation', 'Admin\FormationController');
Route::resource('admin/cours', 'Admin\CoursController');
Route::resource('admin/phase', 'Admin\PhaseController');
Route::resource('admin/question', 'Admin\QuestionController');
Route::resource('admin/reponse-c', 'Admin\ReponseCController');
Route::resource('admin/commentaire', 'Admin\CommentaireController');
Route::resource('admin/reponse-q', 'Admin\ReponseQController');


Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => 'formation'], function () {
        Route::post('/', 'App\Http\Controllers\Admin\FormationController@store');
        Route::get('/create', 'App\Http\Controllers\Admin\FormationController@create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\FormationController@edit');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\FormationController@destroy');
        Route::get('/{id}', 'App\Http\Controllers\Admin\FormationController@show');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\FormationController@update');
        Route::get('/', 'App\Http\Controllers\Admin\FormationController@index');
    });

    Route::group(['prefix' => 'cours'], function () {
        Route::post('/', 'App\Http\Controllers\Admin\CoursController@store');
        Route::get('/create', 'App\Http\Controllers\Admin\CoursController@create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CoursController@edit');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\CoursController@destroy');
        Route::get('/{id}', 'App\Http\Controllers\Admin\CoursController@show');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\CoursController@update');
        Route::get('/', 'App\Http\Controllers\Admin\CoursController@index');
    });

    Route::group(['prefix' => 'phase'], function () {
        Route::post('/', 'App\Http\Controllers\Admin\PhaseController@store');
        Route::get('/create', 'App\Http\Controllers\Admin\PhaseController@create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\PhaseController@edit');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\PhaseController@destroy');
        Route::get('/{id}', 'App\Http\Controllers\Admin\PhaseController@show');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\PhaseController@update');
        Route::get('/', 'App\Http\Controllers\Admin\PhaseController@index');
    });

    Route::group(['prefix' => 'question'], function () {
        Route::post('/', 'App\Http\Controllers\Admin\QuestionController@store');
        Route::get('/create', 'App\Http\Controllers\Admin\QuestionController@create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\QuestionController@edit');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\QuestionController@destroy');
        Route::get('/{id}', 'App\Http\Controllers\Admin\QuestionController@show');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\QuestionController@update');
        Route::get('/', 'App\Http\Controllers\Admin\QuestionController@index');
    });

    Route::group(['prefix' => 'reponse-c'], function () {
        Route::post('/', 'App\Http\Controllers\Admin\ReponseCController@store');
        Route::get('/create', 'App\Http\Controllers\Admin\ReponseCController@create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ReponseCController@edit');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\ReponseCController@destroy');
        Route::get('/{id}', 'App\Http\Controllers\Admin\ReponseCController@show');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\ReponseCController@update');
        Route::get('/', 'App\Http\Controllers\Admin\ReponseCController@index');
    });

    Route::group(['prefix' => 'commentaire'], function () {
        Route::post('/', 'App\Http\Controllers\Admin\CommentaireController@store');
        Route::get('/create', 'App\Http\Controllers\Admin\CommentaireController@create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CommentaireController@edit');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\CommentaireController@destroy');
        Route::get('/{id}', 'App\Http\Controllers\Admin\CommentaireController@show');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\CommentaireController@update');
        Route::get('/', 'App\Http\Controllers\Admin\CommentaireController@index');
    });

    Route::group(['prefix' => 'reponse-q'], function () {
        Route::post('/', 'App\Http\Controllers\Admin\ReponseQController@store');
        Route::get('/create', 'App\Http\Controllers\Admin\ReponseQController@create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ReponseQController@edit');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\ReponseQController@destroy');
        Route::get('/{id}', 'App\Http\Controllers\Admin\ReponseQController@show');
        Route::patch('/{id}', 'App\Http\Controllers\Admin\ReponseQController@update');
        Route::get('/', 'App\Http\Controllers\Admin\ReponseQController@index');
    });
});
