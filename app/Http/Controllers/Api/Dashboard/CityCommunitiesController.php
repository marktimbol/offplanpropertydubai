<?php

namespace App\Http\Controllers\Api\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityCommunitiesController extends Controller
{
    public function index($city)
    {
    	return $city->communities;
    }
}
