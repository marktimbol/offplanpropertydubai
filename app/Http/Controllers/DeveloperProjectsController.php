<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use JavaScript;

class DeveloperProjectsController extends Controller
{
    public function show($developer, $project)
    {
        $projectKey = sprintf('%s-page', $project->slug);
        $project = Cache::remember($projectKey, 60, function() use ($project) {
            $project->load(
                'developer.projects.photos', 
                'developer.projects.developer', 
                'logo', 
                'photos', 
                'types', 
                'videos', 
                'floorplans', 
                'brochure', 
                'payments', 
                'communities.city.country'
            );

            return $project;    
        });

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
