<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function show(Developer $developer, Project $project)
    {
    	return view('public.projects.show', compact('developer', 'project'));
    }
}
