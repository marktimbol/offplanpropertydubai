<?php

namespace App\Http\Controllers\Dashboard;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectTranslationsController extends Controller
{
    public function store(Request $request, Project $project)
    {
    	$project->translations()->create([
    		'locale'	=> $request->locale,
    		'name'	=> $request->name,
    		'title'	=> $request->title,
    		'price'	=> $request->price,
    		'expected_completion_date'	=> $request->expected_completion_date,
    		'description'	=> $request->description
    	]);
    }
}
