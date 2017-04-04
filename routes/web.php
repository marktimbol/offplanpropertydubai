<?php

use App\Project;
use App\ProjectTranslation;

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

Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
    // var_dump($query->sql);
});

Route::get('translations', function() {
	$projects = Project::all();

	foreach( $projects as $project )
	{
		ProjectTranslation::create([
			'project_id'	=> $project->id,
			'locale'	=> 'en',
			'name'	=> $project->name,
			'title'	=> $project->title,
			'price'	=> $project->price,
			'expected_completion_date'	=> $project->expected_completion_date,
			'description'	=> $project->description,
		]);
		// $project->translateOrNew('en')->name = $project->name;
		// $project->translateOrNew('en')->title = $project->title;
		// $project->translateOrNew('en')->price = $project->price;
		// $project->translateOrNew('en')->expected_completion_date = $project->expected_completion_date;
		// $project->translateOrNew('en')->description = $project->description;
		// $project->save();
	}

	return 'Done';

});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::resource('contact', 'ContactsController', [
	'only'	=> ['store']
]);

Route::get('/search', ['as' => 'search', 'uses' => 'SearchController@index']);

Route::resource('developers', 'DevelopersController', [
	'only'	=> ['index', 'show']
]);
Route::resource('communities', 'CommunitiesController', [
	'only' => ['index', 'show']
]);
Route::resource('communities.projects', 'CommunityProjectsController', [
	'only' => ['index']
]);

Route::resource('inquiries', 'GeneralInquiriesController');
Route::resource('projects.inquiries', 'InquiriesController');
Route::resource('projects.brochures', 'ProjectBrochuresController');

Route::resource('projects', 'ProjectsController', [
	'only'	=> ['index', 'show']
]);

Route::get('floorplans', 'FloorplansController@index');

Route::resource('compares', 'ComparesController', [
	'only' => ['index', 'store', 'destroy']
]);

Route::delete('reset-compare', 'ResetCompareController@destroy');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
	Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
	Route::resource('inquiries', 'Dashboard\InquiriesController');
	Route::resource('downloads', 'Dashboard\DownloadsController');
	Route::resource('contacts', 'Dashboard\ContactsController');
	Route::resource('countries', 'Dashboard\CountriesController');
	Route::resource('countries.cities', 'Dashboard\CitiesController');
	Route::resource('cities.communities', 'Dashboard\CommunitiesController');
	Route::resource('communities.photos', 'Dashboard\CommunityPhotosController');
	Route::resource('developers', 'Dashboard\DevelopersController');
	Route::resource('developers.projects', 'Dashboard\DeveloperProjectsController');
	Route::resource('developers.projects.payments', 'Dashboard\ProjectPaymentsController');
	Route::resource('developers.projects.types', 'Dashboard\ProjectTypesController');
	Route::resource('developers.projects.logos', 'Dashboard\ProjectLogosController', [
		'only' => ['store', 'destroy']
	]);
	Route::resource('developers.projects.videos', 'Dashboard\ProjectVideosController', [
		'only' => ['store', 'destroy']
	]);
	Route::resource('developers.projects.photos', 'Dashboard\ProjectPhotosController', [
		'only' => ['store', 'destroy']
	]);
	Route::resource('developers.projects.floorplans', 'Dashboard\ProjectFloorPlansController', [
		'only' => ['store', 'update', 'destroy']
	]);
	Route::resource('developers.projects.brochures', 'Dashboard\ProjectBrochuresController', [
		'only' => ['store', 'update', 'destroy']
	]);
	Route::resource('developers.photos', 'Dashboard\DeveloperPhotosController');
	Route::resource('categories', 'Dashboard\CategoriesController');
	Route::resource('categories.types', 'Dashboard\CategoryTypesController');
	Route::resource('slides', 'Dashboard\SlidesController');
});

Route::get('/{developer}/{project}/floorplans', [
	'as' => 'projects.floorplans.show', 
	'uses' => 'ProjectFloorplansController@show'
]);

Route::get('project/{developer}/{project}', [
	'as' => 'developers.projects.show', 
	'uses' => 'DeveloperProjectsController@show'
]);