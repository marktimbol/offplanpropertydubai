<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class FloorplansController extends Controller
{
    public function index()
    {
        $projects = Cache::remember('floorplans', 30, function() {
        	return Project::with('developer', 'photos')->latest()->paginate(12);
        });
        
        return view('public.floorplans.index', compact('projects'));
    }
}
