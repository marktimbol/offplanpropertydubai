<?php

namespace App\Http\Controllers\Api\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CountryCitiesController extends Controller
{
    public function index($country)
    {
    	return $country->cities()->orderBy('name', 'asc')->get();
    }
}
