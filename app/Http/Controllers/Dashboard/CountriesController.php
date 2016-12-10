<?php

namespace App\Http\Controllers\Dashboard;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountriesController extends Controller
{
    public function index()
    {
    	$countries = Country::orderBy('name', 'asc')->get();

    	return view('dashboard.countries.index', compact('countries'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required'
        ]);
        
    	Country::create($request->all());

    	flash()->success('Country has been successfully saved.');
    	return back();
    }

    public function destroy($country)
    {
    	$country->delete();

    	flash()->success('Country has been successfully removed.');
    	return back();
    }
}
