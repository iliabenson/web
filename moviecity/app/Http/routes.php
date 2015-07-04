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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
	Route::get('movies/{movies}/edit', 'MoviesController@edit');
	Route::put('movies/{movies}', 'MoviesController@update');
	Route::patch('movies/{movies}', 'MoviesController@update');
	Route::get('movies/create', 'MoviesController@create');
	Route::post('movies', 'MoviesController@store');
});
Route::get('movies', 'MoviesController@index');
Route::get('movies/{movies}', 'MoviesController@show');
Route::delete('movies/{movies}', 'MoviesController@destroy');
Route::post('movies/results', 'MoviesController@results');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);