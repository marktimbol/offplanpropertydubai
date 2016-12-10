<?php

namespace App\Http\Controllers;

use App\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommunityProjectsController extends Controller
{
    public function index(Community $community)
    {
    	$community->load('projects.photos', 'projects.developer');
    	// $communityProjects = sprintf('%s-projects', $community->slug);

    	// $community = Cache::remember($communityProjects, 30, function() use ($community) {
    	// 	return $community->load('projects');
    	// });

    	return view('public.communities.projects.index', compact('community'));
    }
}
