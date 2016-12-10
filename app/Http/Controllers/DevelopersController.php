<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests;
use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    public function index()
    {
    	$developers = Developer::withCount('projects')->latest()->get();
    	return view('public.developers.index', compact('developers'));
    }

    public function show($developer)
    {
    	$developer->load('projects.photos');

    	return view('public.developers.show', compact('developer'));
    }

}
