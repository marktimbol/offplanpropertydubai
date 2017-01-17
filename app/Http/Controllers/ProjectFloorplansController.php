<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectFloorplansController extends Controller
{
    public function show($developer, $project)
    {
        $projectKey = sprintf('%s-floorplans-page', $project->slug);
        $project = Cache::remember($projectKey, 60, function() use ($project) {
            $project->load(
                'developer.projects.photos', 
                'developer.projects.developer', 
                'logo', 
                'photos', 
                'floorplans', 
                'communities.city.country'
            );

            return $project;    
        });

    	$logo = '';
    	if( count($project->logo) > 0 ) {
    		$logo = getPhotoPath($project->logo->photo);
    	}

    	return view('public.floorplans.show', compact('project', 'logo'));
    }
}
