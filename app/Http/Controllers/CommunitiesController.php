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
        $filters = Cache::remember('filters', 30, function() {
            return Community::has('projects')->withCount('projects')->orderBy('slug', 'asc')->get();
        });

        $communities = Cache::remember('communities', 30, function() {
            $communities = Community::has('projects')->orderBy('slug', 'asc')->paginate(10);
            $communities->load('projects.developer', 'projects.photos');

            return $communities;
        });

        if( request()->has('filter') ) {
            $communities = Community::has('projects')
                        ->whereSlug(request()->filter)
                        ->orderBy('slug', 'asc')
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
