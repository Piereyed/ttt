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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');




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
