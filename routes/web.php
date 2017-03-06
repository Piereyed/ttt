<?php

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

Route::get('/',['as'=>'inicio',function () {

    return view('index');
}] )->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/inicio_sedes', 'HomeController@locals');
Route::post('/entrar_sede', 'HomeController@entrar');




Route::group(['middleware' => 'auth'], function(){
    
    Route::group(['prefix' => 'administradores'], function(){    
        Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
        Route::get('create', ['as' => 'admin.create', 'uses' => 'AdminController@create']);
        Route::post('create', ['as' => 'admin.store', 'uses' => 'AdminController@store']);
        Route::get('show/{id}', ['as' => 'admin.show', 'uses' => 'AdminController@show']);
        Route::get('edit/{id}', ['as' => 'admin.edit', 'uses' => 'AdminController@edit']);
        Route::post('edit/{id}', ['as' => 'admin.update', 'uses' => 'AdminController@update']);
        Route::get('delete/{id}', ['as' => 'admin.delete', 'uses' => 'AdminController@destroy']);
    });

    Route::group(['prefix' => 'entrenadores'], function(){    
        Route::get('/', ['as' => 'trainer.index', 'uses' => 'TrainerController@index']);
        Route::get('create', ['as' => 'trainer.create', 'uses' => 'TrainerController@create']);
        Route::post('create', ['as' => 'trainer.store', 'uses' => 'TrainerController@store']);
        Route::get('show/{id}', ['as' => 'trainer.show', 'uses' => 'TrainerController@show']);
        Route::get('edit/{id}', ['as' => 'trainer.edit', 'uses' => 'TrainerController@edit']);
        Route::post('edit/{id}', ['as' => 'trainer.update', 'uses' => 'TrainerController@update']);
        Route::get('delete/{id}', ['as' => 'trainer.delete', 'uses' => 'TrainerController@destroy']);
    });

    Route::group(['prefix' => 'clientes'], function(){    
        Route::get('/', ['as' => 'client.index', 'uses' => 'ClientController@index']);
        Route::get('create', ['as' => 'client.create', 'uses' => 'ClientController@create']);
        Route::post('create', ['as' => 'client.store', 'uses' => 'ClientController@store']);
        Route::get('show/{id}', ['as' => 'client.show', 'uses' => 'ClientController@show']);
        Route::get('edit/{id}', ['as' => 'client.edit', 'uses' => 'ClientController@edit']);
        Route::post('edit/{id}', ['as' => 'client.update', 'uses' => 'ClientController@update']);
        Route::get('delete/{id}', ['as' => 'client.delete', 'uses' => 'ClientController@destroy']);
    });

    Route::group(['prefix' => 'sedes'], function(){    
        Route::get('/', ['as' => 'local.index', 'uses' => 'LocalController@index']);
        Route::get('create', ['as' => 'local.create', 'uses' => 'LocalController@create']);
        Route::post('create', ['as' => 'local.store', 'uses' => 'LocalController@store']);
        Route::get('show/{id}', ['as' => 'local.show', 'uses' => 'LocalController@show']);
        Route::get('edit/{id}', ['as' => 'local.edit', 'uses' => 'LocalController@edit']);
        Route::post('edit/{id}', ['as' => 'local.update', 'uses' => 'LocalController@update']);
        Route::get('delete/{id}', ['as' => 'local.delete', 'uses' => 'LocalController@destroy']);
    });

});



