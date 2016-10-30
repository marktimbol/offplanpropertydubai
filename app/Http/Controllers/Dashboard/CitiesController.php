<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index($country)
    {
    	$cities = $country->cities;
    	return view('dashboard.cities.index', compact('country', 'cities'));
    }

    public function store(Request $request, $country)
    {
    	$country->cities()->create([
    		'name'	=> $request->name
    	]);

    	flash()->success('City has been successfully saved.');
    	return back();
    }

    public function destroy($country, $city)
    {
        $city->delete();

        flash()->success('City has been successfully removed.');
        return back();
    }
}
