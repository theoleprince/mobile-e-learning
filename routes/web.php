<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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


/* Route::get('/', function () {
    return view('auth.login');
}); */
Route::get('/', 'App\Http\Controllers\ClientController@index');

Route::group(['prefix' => 'inscriptionUser'], function () {
    Route::post('/', 'App\Http\Controllers\ClientController@store')->name('register');
    Route::get('/create', 'App\Http\Controllers\ClientController@create')->name('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {


    /************Client***************/
  

    Route::group(['prefix' => '/user'], function () {
       /*  Route::get('/formation', function () {
            return view('admin.client.formation');
        }); */

        Route::group(['prefix' => 'reponse-q'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\ReponseQController@store')->middleware('has-permission:reponse_qs-create');
            Route::get('/create', 'App\Http\Controllers\Admin\ReponseQController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\ReponseQController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\ReponseQController@destroy')->middleware('has-permission:reponse_qs-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\ReponseQController@show')->middleware('has-permission:reponse_qs-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\ReponseQController@update')->middleware('has-permission:reponse_qs-update');
            Route::get('/', 'App\Http\Controllers\Admin\QuestionController@index')->middleware('has-permission:reponse_qs-read');
        });

        Route::get('/phase/{id}', 'App\Http\Controllers\ClientController@phase');
        Route::get('/cours', 'App\Http\Controllers\HomeController@index');
        Route::post('/cours/{id}', 'App\Http\Controllers\ClientController@finish');
        Route::post('/commentaire', 'App\Http\Controllers\Admin\CommentaireController@store');
        
        

        Route::get('/question', 'App\Http\Controllers\Admin\QuestionController@index')->middleware('has-permission:questions-read');
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

        Route::group(['prefix' => 'user'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\UserController@store')->middleware('has-permission:users-create');
            Route::get('/create', 'App\Http\Controllers\Admin\UserController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\UserController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\UserController@destroy')->middleware('has-permission:users-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\UserController@show')->middleware('has-permission:users-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\UserController@update')->middleware('has-permission:users-update');
            Route::get('/', 'App\Http\Controllers\Admin\UserController@index')->middleware('has-permission:users-read');
        });

        Route::group(['prefix' => 'formateur'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\FormateurController@store')->middleware('has-permission:users-create');
            Route::get('/create', 'App\Http\Controllers\Admin\FormateurController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\FormateurController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\FormateurController@destroy')->middleware('has-permission:users-delete');
            Route::get('/{id}', 'App\Http\Controllers\Admin\FormateurController@show')->middleware('has-permission:users-read');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\FormateurController@update')->middleware('has-permission:users-update');
            Route::get('/', 'App\Http\Controllers\Admin\FormateurController@index')->middleware('has-permission:users-read');
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

        Route::group(['prefix' => 'type-category'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\TypeCategoryController@store');
            Route::get('/create', 'App\Http\Controllers\Admin\TypeCategoryController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\TypeCategoryController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\TypeCategoryController@destroy');
            Route::get('/{id}', 'App\Http\Controllers\Admin\TypeCategoryController@show');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\TypeCategoryController@update');
            Route::get('/', 'App\Http\Controllers\Admin\TypeCategoryController@index');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\CategoryController@store');
            Route::get('/create', 'App\Http\Controllers\Admin\CategoryController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CategoryController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy');
            Route::get('/{id}', 'App\Http\Controllers\Admin\CategoryController@show');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\CategoryController@update');
            Route::get('/', 'App\Http\Controllers\Admin\CategoryController@index');
        });

         Route::group(['prefix' => 'video'], function () {
            Route::post('/', 'App\Http\Controllers\Admin\VideoController@store');
            Route::get('/create', 'App\Http\Controllers\Admin\VideoController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\VideoController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\Admin\VideoController@destroy');
            Route::get('/{id}', 'App\Http\Controllers\Admin\VideoController@show');
            Route::patch('/{id}', 'App\Http\Controllers\Admin\VideoController@update');
            Route::get('/', 'App\Http\Controllers\Admin\VideoController@index');
        });

          Route::group(['prefix' => 'createur'], function () {
            Route::post('/', 'App\Http\Controllers\VideoCreateurController@store');
            Route::get('/create', 'App\Http\Controllers\VideoCreateurController@create');
            Route::get('/{id}/edit', 'App\Http\Controllers\VideoCreateurController@edit');
            Route::delete('/{id}', 'App\Http\Controllers\VideoCreateurController@destroy');
            Route::get('/{id}', 'App\Http\Controllers\VideoCreateurController@show');
            Route::patch('/{id}', 'App\Http\Controllers\VideoCreateurController@update');
            Route::get('/', 'App\Http\Controllers\VideoCreateurController@index');
        });
        
        

    });
});

        Route::get('/formation', 'App\Http\Controllers\ClientController@index');

        //Route::view('contact', 'client/contact');
        Route::get('contact', 'App\Http\Controllers\ContactController@create')->name('contact');
        Route::post('contact', 'App\Http\Controllers\ContactController@store');
        //prof create
        Route::get('prof-create', 'App\Http\Controllers\ProfCreateController@create')->name('prof');
        Route::post('prof-create', 'App\Http\Controllers\ProfCreateController@store');
        //prof create
        Route::get('creator', 'App\Http\Controllers\ClientController@getTestCreator')->name('devenir-creator');
        Route::get('creator/{id}', 'App\Http\Controllers\ClientController@edit');
        Route::post('creator/{id}', 'App\Http\Controllers\ClientController@update')->name('creator.update');
        //get type and category
        Route::get('type-category', 'App\Http\Controllers\ClientController@getTypeCategories');
        Route::get('video/{id}', 'App\Http\Controllers\ClientController@getVideos');
        Route::get('video/Idp/{id}', 'App\Http\Controllers\ClientController@getAllPhaseIdp'); 