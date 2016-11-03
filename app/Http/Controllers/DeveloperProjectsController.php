<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JavaScript;
use App\Http\Requests;

class DeveloperProjectsController extends Controller
{
    public function show($developer, $project)
    {
    	$project->load('communities.city.country');

    	$logo = '';
    	if( count($project->logo) > 0 ) {
    		$logo = getPhotoPath($project->logo->photo);
    	}

    	JavaScript::put([
    		'latitude'	=> $project->latitude,
    		'longitude'	=> $project->longitude,
            'videos'    => $project->videos->pluck('id')
    	]);

    	return view('public.projects.show', compact('project', 'logo'));
    }
}
