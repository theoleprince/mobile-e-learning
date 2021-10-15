<?php

use Illuminate\Support\Facades\Auth;
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
    return view('layouts/app');
});

// Route::resource('admin/formation', 'AppHttpControllers\Admin\FormationController');
// Route::resource('admin/cours', 'AppHttpControllers\Admin\CoursController');
// Route::resource('admin/phase', 'AppHttpControllers\Admin\PhaseController');
// Route::resource('admin/question', 'AppHttpControllers\Admin\QuestionController');
// Route::resource('admin/reponseC', 'AppHttpControllers\Admin\ReponseCController');
// Route::resource('admin/commentaire', 'AppHttpControllers\Admin\CommentaireController');
// Route::resource('admin/reponse-q', 'AppHttpControllers\Admin\ReponseQController');
Route::group(['prefix' => 'admin'], function () {
    /**************Formation***************/
    Route::group(['prefix'=>'/formation'], function(){
        Route::post('/', 'App\Http\\Controllers\\Admin\\FormationController@store');
        Route::get('/create', 'App\Http\\Controllers\\Admin\\FormationController@create');
        Route::get('/{id}/edit', 'App\Http\\Controllers\\Admin\\FormationController@edit');
        Route::patch('/{id}', 'App\Http\\Controllers\\Admin\\FormationController@update');
        Route::delete('/{id}', 'App\Http\\Controllers\\Admin\\FormationController@destroy');
        Route::get('/{id}', 'App\Http\\Controllers\\Admin\\FormationController@show');
        Route::get('/', 'App\Http\\Controllers\\Admin\\FormationController@index');
    });

    /**************Cours***************/
    Route::group(['prefix'=>'/cours'], function(){
        Route::post('/', 'App\Http\\Controllers\\Admin\\CoursController@store');
        Route::get('/create', 'App\Http\\Controllers\\Admin\\CoursController@create');
        Route::get('/{id}/edit', 'App\Http\\Controllers\\Admin\\CoursController@edit');
        Route::patch('/{id}', 'App\Http\\Controllers\\Admin\\CoursController@update');
        Route::delete('/{id}', 'App\Http\\Controllers\\Admin\\CoursController@destroy');
        Route::get('/{id}', 'App\Http\\Controllers\\Admin\\CoursController@show');
        Route::get('/', 'App\Http\\Controllers\\Admin\\CoursController@index');
    });

    /**************Phase***************/
    Route::group(['prefix'=>'/phase'], function(){
        Route::post('/', 'App\Http\\Controllers\\Admin\\PhaseController@store');
        Route::get('/create', 'App\Http\\Controllers\\Admin\\PhaseController@create');
        Route::get('/{id}/edit', 'App\Http\\Controllers\\Admin\\PhaseController@edit');
        Route::patch('/{id}', 'App\Http\\Controllers\\Admin\\PhaseController@update');
        Route::delete('/{id}', 'App\Http\\Controllers\\Admin\\PhaseController@destroy');
        Route::get('/{id}', 'App\Http\\Controllers\\Admin\\PhaseController@show');
        Route::get('/', 'App\Http\\Controllers\\Admin\\PhaseController@index');
    });

    /**************Question***************/
    Route::group(['prefix'=>'/question'], function(){
        Route::post('/', 'App\Http\\Controllers\\Admin\\QuestionController@store');
        Route::get('/create', 'App\Http\\Controllers\\Admin\\QuestionController@create');
        Route::get('/{id}/edit', 'App\Http\\Controllers\\Admin\\QuestionController@edit');
        Route::patch('/{id}', 'App\Http\\Controllers\\Admin\\QuestionController@update');
        Route::delete('/{id}', 'App\Http\\Controllers\\Admin\\QuestionController@destroy');
        Route::get('/{id}', 'App\Http\\Controllers\\Admin\\QuestionController@show');
        Route::get('/', 'App\Http\\Controllers\\Admin\\QuestionController@index');
    });

    /**************Reponse Commentaire***************/
    Route::group(['prefix'=>'/reponseC'], function(){
        Route::post('/', 'App\Http\\Controllers\\Admin\\ReponseCController@store');
        Route::get('/create', 'App\Http\\Controllers\\Admin\\ReponseCController@create');
        Route::get('/{id}/edit', 'App\Http\\Controllers\\Admin\\ReponseCController@edit');
        Route::patch('/{id}', 'App\Http\\Controllers\\Admin\\ReponseCController@update');
        Route::delete('/{id}', 'App\Http\\Controllers\\Admin\\ReponseCController@destroy');
        Route::get('/{id}', 'App\Http\\Controllers\\Admin\\ReponseCController@show');
        Route::get('/', 'App\Http\\Controllers\\Admin\\ReponseCController@index');
    });

    /**************Commentaire***************/
    Route::group(['prefix'=>'/commentaire'], function(){
        Route::post('/', 'App\Http\\Controllers\\Admin\\CommentaireController@store');
        Route::get('/create', 'App\Http\\Controllers\\Admin\\CommentaireController@create');
        Route::get('/{id}/edit', 'App\Http\\Controllers\\Admin\\CommentaireController@edit');
        Route::patch('/{id}', 'App\Http\\Controllers\\Admin\\CommentaireController@update');
        Route::delete('/{id}', 'App\Http\\Controllers\\Admin\\CommentaireController@destroy');
        Route::get('/{id}', 'App\Http\\Controllers\\Admin\\CommentaireController@show');
        Route::get('/', 'App\Http\\Controllers\\Admin\\CommentaireController@index');
    });

    /**************Reponse Question***************/
    Route::group(['prefix'=>'/reponse-q'], function(){
        Route::post('/', 'App\Http\\Controllers\\Admin\\ReponseQController@store');
        Route::get('/create', 'App\Http\\Controllers\\Admin\\ReponseQController@create');
        Route::get('/{id}/edit', 'App\Http\\Controllers\\Admin\\ReponseQController@edit');
        Route::patch('/{id}', 'App\Http\\Controllers\\Admin\\ReponseQController@update');
        Route::delete('/{id}', 'App\Http\\Controllers\\Admin\\ReponseQController@destroy');
        Route::get('/{id}', 'App\Http\\Controllers\\Admin\\ReponseQController@show');
        Route::get('/', 'App\Http\\Controllers\\Admin\\ReponseQController@index');
    });

});
