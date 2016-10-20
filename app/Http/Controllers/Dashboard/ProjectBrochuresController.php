<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectBrochuresController extends Controller
{
    public function store(Request $request, $developer, $project)
    {    	
		$file = $request->file->store(
    		sprintf('developers/%s/%s/brochure', $developer->slug, str_slug($project->name))
		, 's3');

		$title = explode('.', $request->file->getClientOriginalName());

		$project->brochure()->create([
			'title'	=> $title[0],
			'photo'	=> $file
		]);
    }
}
