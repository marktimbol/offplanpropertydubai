<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommunitiesController extends Controller
{
    public function index($city)
    {
    	$communities = $city->communities()->orderBy('slug', 'asc')->get();
    	return view('dashboard.communities.index', compact('city', 'communities'));
    }

    public function show($city, $community)
    {
        $community->load('projects');        
        return view('dashboard.communities.show', compact('city', 'community'));
    }

    public function store(Request $request, $city)
    {
        $this->validate($request, [
            'slug'  => 'required'
        ]);

    	$city->communities()->create($request->all());

    	flash()->success('Community has been successfully saved.');
    	return back();
    }

    public function update(Request $request, $city, $community)
    {
        $this->validate($request, [
            'slug'  => 'required'
        ]);        
        
        $community->update($request->all());

        flash()->success('Community has been successfully updated.');
        return back();
    }

    public function destroy($city, $community)
    {
        $community->delete();

        flash()->success('Community has been successfully removed.');
        return back();
    }
}
