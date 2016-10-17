<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests;
use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    public function index()
    {
    	$developers = Developer::latest()->get();
    	return view('public.developers.index', compact('developers'));
    }

    public function show(Developer $developer)
    {
    	return view('public.developers.show', compact('developer'));
    }

}
