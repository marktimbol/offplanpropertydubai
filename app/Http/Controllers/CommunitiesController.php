<?php

namespace App\Http\Controllers;

use App\Community;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CommunitiesController extends Controller
{
    public function index()
    {
        $filters = Community::has('projects')->withCount('projects')->orderBy('name', 'asc')->get();
    	$communities = Community::has('projects')->orderBy('name', 'asc')->paginate(10);
        $communities->load('projects.developer', 'projects.photos');

        if( request()->has('filter') ) {
            $communities = Community::has('projects')
                        ->whereSlug(request()->filter)
                        ->orderBy('name', 'asc')
                        ->paginate(10);
            $communities->load('projects.developer', 'projects.photos');
        }
        
    	return view('public.communities.index', compact('communities', 'filters'));
    }

    public function show($community)
    {
        $community->load('projects.developer', 'projects.photos');
        
        return view('public.communities.show', compact('community'));
    }
}
