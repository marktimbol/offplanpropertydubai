<?php

namespace App\Http\Controllers\Dashboard;

use App\Developer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class DeveloperProjectsController extends Controller
{
	public function show(Developer $developer, Project $project)
	{
		return view('dashboard.projects.show', compact('developer', 'project'));
	}

	public function create(Developer $developer)
	{
		return view('dashboard.projects.create', compact('developer'));
	}

    public function store(Request $request, Developer $developer)
    {
    	$developer->projects()->create($request->all());

    	return redirect()->route('dashboard.developers.show', $developer->id);
    }

    public function edit(Developer $developer, Project $project)
    {
        return view('dashboard.projects.edit', compact('developer', 'project'));
    }

    public function update(Request $request, Developer $developer, Project $project)
    {
        $project->update($request->all());

        return back();
    }

    public function destroy(Developer $developer, Project $project)
    {
    	$project->delete();

    	return redirect()->route('dashboard.developers.show', $developer->id);
    }

}
