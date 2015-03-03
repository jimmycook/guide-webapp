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

Route::get('blog', 'BlogController@index');
Route::post('blog', 'BlogController@store');

Route::get('blog/{slug}', 'BlogController@show');

Route::get('food', 'FoodController@index');
Route::get('food/{slug}', 'FoodController@show');

Route::get('/location', 'HomeController@location');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
