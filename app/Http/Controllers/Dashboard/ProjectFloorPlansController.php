<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectFloorPlansController extends Controller
{
    public function store(Request $request, $developer, $project)
    {
    	foreach( $request->file as $file )
    	{
    		$path = $file->store(
	    		sprintf('developers/%s/%s/floorplans', $developer->slug, str_slug($project->name))
    		, 's3');

    		$title = explode('.', $file->getClientOriginalName());

    		$project->floorplans()->create([
    			'title'	=> $title[0],
    			'photo'	=> $path
    		]);
    	}
    }

    public function destroy()
    {

    }
}
