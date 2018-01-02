<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use JavaScript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects =  Project::with('developer', 'photos')->latest()->paginate(12);
        // $projects = Cache::remember('projects', 30, function() {
        // });
        
        return view('public.projects.index', compact('projects'));
    }

    public function show(Project $project)
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
