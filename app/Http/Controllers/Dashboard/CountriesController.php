<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    public function index()
    {
    	$countries = Country::orderBy('name', 'asc')->get();
    	return view('dashboard.countries.index', compact('countries'));
    }
}
