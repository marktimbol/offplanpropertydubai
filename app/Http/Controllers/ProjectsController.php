<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Cache::remember('projects', 30, function() {
        	return Project::with('developer', 'photos')->latest()->get();
        });
        
        return view('public.projects.index', compact('projects'));
    }
}
