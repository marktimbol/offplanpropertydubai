<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
    	$query = request('query');
    	$projects = Project::search($query)->get();
    	
    	return view('public.search', compact('projects', 'query'));
    }
}
