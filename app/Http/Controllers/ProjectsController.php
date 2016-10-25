<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Developer;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        
        return view('public.projects.index', compact('projects'));
    }

    public function show($project)
    {    	
    	$project->load('developer');

    	$logo = '/images/logo.png';
    	if( count($project->logo) > 0 ) {
    		$logo = getPhotoPath($project->logo->photo);
    	}

    	JavaScript::put([
    		'latitude'	=> $project->latitude,
    		'longitude'	=> $project->longitude,
    	]);

    	return view('public.projects.show', compact('project', 'logo'));
    }
}
