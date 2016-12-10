<?php

namespace App\Http\Controllers;

use App\Community;
use Illuminate\Http\Request;

class CommunityProjectsController extends Controller
{
    public function index(Community $community)
    {
    	$community->load('projects');

    	return view('public.communities.projects.index', compact('community'));
    }
}
