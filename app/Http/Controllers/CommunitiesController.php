<?php

namespace App\Http\Controllers;

use App\Community;
use App\Http\Requests;
use Illuminate\Http\Request;

class CommunitiesController extends Controller
{
    public function index()
    {
        $filters = Community::orderBy('name', 'asc')->get();
    	$communities = Community::has('projects')->orderBy('name', 'asc')->paginate(10);

        if( request()->has('filter') ) {
            $communities = Community::has('projects')
                        ->whereSlug(request()->filter)
                        ->orderBy('name', 'asc')
                        ->paginate(10);
        }
        
    	return view('public.communities.index', compact('communities', 'filters'));
    }

    public function show($community)
    {
        $community->load('projects');
        
        return view('public.communities.show', compact('community'));
    }
}
