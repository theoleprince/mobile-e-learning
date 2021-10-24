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

Route::get('/login', function () {
    return view('home');
});

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {


    /************Client***************/

    Route::group(['prefix' => '/user'], function () {
        Route::get('/formation', function () {
            return view('admin.client.formation');
        });

        Route::get('/phase/{id}', 'App\Http\Controllers\ClientController@phase');
        Route::get('/cours/{id}', 'App\Http\Controllers\ClientController@cours');
        Route::post('/cours/{id}', 'App\Http\Controllers\ClientController@finish');
        Route::get('/formation', 'App\Http\Controllers\ClientController@index');

        Route::get('/cours', function () {
            return view('admin.client.cours');
        });

        Route::get('/phase', function () {
            return view('admin.client.phase');
        });
    });


/************Administratuer***************/
    Route::group(['prefix' => '/admin'], function () {
        //chemin ge gestion du chemin du profil
        Route::group(['prefix'=>'/profil'], function(){
            Route::get('/', 'App\Http\Controllers\Admin\UserController@profile');
        });

        Route::group(['prefix' => 'formation'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\FormationController@store')->middleware('has-permission:formations-create');
            Route::get('/create', 'App\Http\Controllers\Admin\FormationController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\FormationController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\FormationController@destroy')->middleware('has-permission:formations-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\FormationController@show')->middleware('has-permission:formations-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\FormationController@update')->middleware('has-permission:formations-update');
            Route::get('/', 'App\Http\Controllers\Admin\FormationController@index')->middleware('has-permission:formations-read');
        });

        Route::group(['prefix' => 'cours'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\CoursController@store')->middleware('has-permission:cours-create');
            Route::get('/create', 'App\Http\Controllers\Admin\CoursController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CoursController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\CoursController@destroy')->middleware('has-permission:cours-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\CoursController@show')->middleware('has-permission:cours-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\CoursController@update')->middleware('has-permission:cours-update');
            Route::get('/', 'App\Http\Controllers\Admin\CoursController@index')->middleware('has-permission:cours-read');
        });

        Route::group(['prefix' => 'phase'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\PhaseController@store')->middleware('has-permission:phases-create');
            Route::get('/create', 'App\Http\Controllers\Admin\PhaseController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\PhaseController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\PhaseController@destroy')->middleware('has-permission:phases-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\PhaseController@show')->middleware('has-permission:phases-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\PhaseController@update')->middleware('has-permission:phases-update');
            Route::get('/', 'App\Http\Controllers\Admin\PhaseController@index')->middleware('has-permission:phases-read');
        });

        Route::group(['prefix' => 'question'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\QuestionController@store')->middleware('has-permission:questions-create');
            Route::get('/create', 'App\Http\Controllers\Admin\QuestionController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\QuestionController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\QuestionController@destroy')->middleware('has-permission:questions-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\QuestionController@show')->middleware('has-permission:questions-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\QuestionController@update')->middleware('has-permission:questions-update');
            Route::get('/', 'App\Http\Controllers\Admin\QuestionController@index')->middleware('has-permission:questions-read');
        });

        Route::group(['prefix' => 'reponse-c'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\ReponseCController@store')->middleware('has-permission:reponse_cs-create');
            Route::get('/create', 'App\Http\Controllers\Admin\ReponseCController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ReponseCController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\ReponseCController@destroy')->middleware('has-permission:reponse_cs-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\ReponseCController@show')->middleware('has-permission:reponse_cs-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\ReponseCController@update')->middleware('has-permission:reponse_cs-update');
            Route::get('/', 'App\Http\Controllers\Admin\ReponseCController@index')->middleware('has-permission:reponse_cs-read');
        });

        Route::group(['prefix' => 'commentaire'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\CommentaireController@store')->middleware('has-permission:commentaires-create');
            Route::get('/create', 'App\Http\Controllers\Admin\CommentaireController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CommentaireController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\CommentaireController@destroy')->middleware('has-permission:commentaires-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\CommentaireController@show')->middleware('has-permission:commentaires-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\CommentaireController@update')->middleware('has-permission:commentaires-update');
            Route::get('/', 'App\Http\Controllers\Admin\CommentaireController@index')->middleware('has-permission:commentaires-read');
        });

        Route::group(['prefix' => 'reponse-q'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\ReponseQController@store')->middleware('has-permission:reponse_qs-create');
            Route::get('/create', 'App\Http\Controllers\Admin\ReponseQController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ReponseQController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\ReponseQController@destroy')->middleware('has-permission:reponse_qs-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\ReponseQController@show')->middleware('has-permission:reponse_qs-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\ReponseQController@update')->middleware('has-permission:reponse_qs-update');
            Route::get('/', 'App\Http\Controllers\Admin\ReponseQController@index')->middleware('has-permission:reponse_qs-read');
        });
    });
});
