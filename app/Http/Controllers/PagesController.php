<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests;
use App\Slide;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    public function home()
    {
    	// $projects = Project::with('developer')->latest()->take(6)->get();
    	$projects = Cache::remember('home_projects', 15, function() {
            return Project::with('developer', 'photos')->latest()->take(6)->get();
        });

        $slides = Cache::remember('home_slides', 15, function() {
            return Slide::latest()->get();
        }); 
    	
    	return view('public.home', compact('projects', 'slides'));
    }

    public function testing()
    {
        $projects = Project::with('developer')->latest()->take(6)->get();
        
        return view('public.home', compact('projects'));
    }      
    
    public function contact()
    {
    	return view('public.contact');	
    }
}
