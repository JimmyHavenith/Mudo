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

Route::get('/', ['as' => 'home', 'uses' => 'PageController@latest']);
Route::controller('auth', 'Auth\AuthController');
Route::get('quiz', ['as' => 'quiz', 'uses' => 'PageController@quiz']);
Route::get('movies', ['as' => 'movies', 'uses' => 'PageController@movies']);

Route::get('movies/{id}-{slug}', 'MovieController@show');
Route::get('person/{id}-{slug}', 'PersonController@show');
Route::get('director/{id}-{slug}', 'DirectorController@show');
Route::get('genre/{id}-{slug}', 'GenreController@show');

Route::get('question', 'QuestionController@index');
Route::get('question2/{tag}', 'QuestionController@show');
Route::get('question3/{tag}', 'QuestionController@showDeux');
Route::get('question4/{tag}', 'QuestionController@showTrois');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('watchlist' , 'FavoritesController');
Route::resource('markview' , 'ViewsController');

Route::get('discover', 'DiscoversController@index');
Route::resource('my-discovers', 'DiscoversController');

Route::get('search', 'SearchController@index');
Route::resource('my-search', 'SearchController');
