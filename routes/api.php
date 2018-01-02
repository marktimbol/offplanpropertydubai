<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('countries.cities', 'Api\Dashboard\CountryCitiesController', [
	'only' => ['index']
]);

Route::resource('cities.communities', 'Api\Dashboard\CityCommunitiesController', [
	'only' => ['index']
]);
