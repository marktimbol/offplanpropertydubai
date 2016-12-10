<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DevelopersController extends Controller
{
    public function index()
    {
    	$developers = Cache::remember('developers', 30, function() {
            return Developer::withCount('projects')->latest()->get();
        });
        
    	return view('public.developers.index', compact('developers'));
    }

    public function show($developer)
    {
    	$developer->load('projects.photos');

    	return view('public.developers.show', compact('developer'));
    }

}
