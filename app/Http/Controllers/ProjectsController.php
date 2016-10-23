<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function show($project)
    {    	
    	$project->load('developer');

    	$logo = '/images/logo.png';
    	if( count($project->logo) > 0 ) {
    		$logo = getPhotoPath($project->logo->photo);
    	}
    	return view('public.projects.show', compact('project', 'logo'));
    }
}
