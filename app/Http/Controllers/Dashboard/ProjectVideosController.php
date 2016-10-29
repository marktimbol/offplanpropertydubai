<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectVideosController extends Controller
{
    public function store(Request $request, $developer, $project)
    {
    	$project->video()->create([
    		'cover'	=> $request->cover,
    		'link'	=> $request->link
    	]);

    	flash()->success('Project video has been successfully saved.');

    	return back();
    }
}
