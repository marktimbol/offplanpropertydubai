
<?php

use App\Developer;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('/search', function() {
	return Developer::search(request('key'))->get();
});

Route::resource('developers', 'DevelopersController', [
	'only'	=> ['index', 'show']
]);
Route::resource('projects', 'ProjectsController');
Route::resource('projects.inquiries', 'InquiriesController');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
	Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
	Route::resource('developers', 'Dashboard\DevelopersController');
	Route::resource('developers.projects', 'Dashboard\DeveloperProjectsController');
	Route::resource('developers.projects.payments', 'Dashboard\ProjectPaymentsController');
	Route::resource('developers.projects.types', 'Dashboard\ProjectTypesController');
	Route::resource('developers.projects.logos', 'Dashboard\ProjectLogosController', [
		'only' => ['store', 'destroy']
	]);
	Route::resource('developers.projects.photos', 'Dashboard\ProjectPhotosController', [
		'only' => ['store', 'destroy']
	]);
	Route::resource('developers.projects.floorplans', 'Dashboard\ProjectFloorPlansController', [
		'only' => ['store', 'destroy']
	]);
	Route::resource('developers.projects.brochures', 'Dashboard\ProjectBrochuresController', [
		'only' => ['store', 'update', 'destroy']
	]);
	Route::resource('developers.photos', 'Dashboard\DeveloperPhotosController');
	Route::resource('categories', 'Dashboard\CategoriesController');
});