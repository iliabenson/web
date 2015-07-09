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

Route::group(['middleware' => 'auth'], function(){
	Route::get('movies/{movies}/edit', 'MoviesController@edit');
	Route::put('movies/{movies}', 'MoviesController@update');
	Route::patch('movies/{movies}', 'MoviesController@update');
	Route::get('movies/create', 'MoviesController@create');
	Route::post('movies', 'MoviesController@store');
	Route::delete('movies/{movies}', 'MoviesController@destroy');

	Route::get('home', 'PagesController@home');
});

Route::get('/', 'PagesController@index');

Route::get('movies', 'MoviesController@index');
Route::get('movies/{movies}', 'MoviesController@show');
Route::post('movies/results', 'MoviesController@results');

Route::get('actors/{actor}', 'ActorsController@actor');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);