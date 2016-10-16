<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	$developers = Developer::latest()->get();
    	$projects = Project::latest()->take(6)->get();
    	return view('public.home', compact('projects', 'developers'));
    }
}
