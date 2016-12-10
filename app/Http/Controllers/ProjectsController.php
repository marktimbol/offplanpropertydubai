<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Developer;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::with('developer', 'photos')->latest()->get();
        
        return view('public.projects.index', compact('projects'));
    }
}
