<?php

namespace App\Http\Controllers;

use App\Community;
use App\Http\Requests;
use Illuminate\Http\Request;

class CommunitiesController extends Controller
{
    public function index()
    {
    	$communities = Community::all();
    	return view('public.communities.index', compact('communities'));
    }

    public function show($community)
    {
        $community->load('projects');
        return view('public.communities.show', compact('community'));
    }
}
