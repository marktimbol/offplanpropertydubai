<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectLogosController extends Controller
{
    public function store(Request $request, $developer, $project)
    {
    	$path = $request->file->store(
    	    sprintf('developers/%s/%s', $developer->slug, str_slug($project->name))
    	, 's3');

        if( count($project->logo) <= 0 )
        {
			return $project->logo()->create([
				'photo'	=> $path
			]);
        } else {
        	Storage::delete($project->logo->photo);
            return $project->logo()->update([
    			'photo'	=> $path
    		]);        
        }
    }
}
