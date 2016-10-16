<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	$projects = Project::latest()->take(10)->get();
    	return view('public.home', compact('projects'));
    }
}
