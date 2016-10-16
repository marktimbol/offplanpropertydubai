<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@home');
Route::resource('developers.projects', 'ProjectsController');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
	Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
	Route::resource('developers', 'Dashboard\DevelopersController');
	Route::resource('developers.projects', 'Dashboard\DeveloperProjectsController');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
