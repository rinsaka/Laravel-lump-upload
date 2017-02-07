<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/papers', ['as' => 'papers.index', 'uses' => 'PapersController@index']);
Route::get('/papers/create', ['as' => 'papers.create', 'uses' => 'PapersController@create']);
Route::post('/papers', ['as' => 'papers.store', 'uses' => 'PapersController@store']);
