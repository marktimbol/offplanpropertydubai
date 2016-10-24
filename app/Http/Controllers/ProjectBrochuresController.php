<?php

namespace App\Http\Controllers;

use App\Download;
use App\Events\UserDownloadedAProjectBrochure;
use App\Http\Requests;
use Illuminate\Http\Request;

class ProjectBrochuresController extends Controller
{
    public function store(Request $request, $project)
    {
    	$user = Download::create([
    		'name'	=> $request->name,
    		'email'	=> $request->email,
    		'phone'	=> $request->phone,
    		'project'	=> $project->name
    	]);

    	event( new UserDownloadedAProjectBrochure($user, $project) );

    	flash()->success('Nailed it! Please open your email to download the brochure.');
    	return back();
    }
}
