<?php

namespace App\Http\Controllers\Dashboard;

use App\Developer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Project;
use JavaScript;
use Illuminate\Http\Request;

class DeveloperProjectsController extends Controller
{
    public function index($developer)
    {
        // dd($developer);
    }

	public function show($developer, $project)
	{  
		return view('dashboard.projects.show', compact('developer', 'project'));
	}

	public function create($developer)
	{
        JavaScript::put([
            'developer' => $developer
        ]);

        // $filtered = $collection->only(['product_id', 'name']);

		return view('dashboard.projects.create', compact('developer'));
	}

    public function store(Request $request, $developer)
    {
        $this->validate($request, [
            'name'  => 'required'
        ]);

    	$project = $developer->projects()->create($request->all());

        flash()->success(sprintf('%s has been successfully saved.', $project->name));
    	return redirect()->route('dashboard.developers.projects.show', [$developer->id, $project->id]);
    }

    public function edit($developer, $project)
    {
        return view('dashboard.projects.edit', compact('developer', 'project'));
    }

    public function update(Request $request, $developer, $project)
    {
        $this->validate($request, [
            'name'  => 'required'
        ]);
        
        $project->update($request->all());

        flash()->success(sprintf('%s has been successfully saved.', $project->name));
        return redirect()->route('dashboard.developers.projects.show', [$developer->id, $project->id]);
    }

    public function destroy($developer, $project)
    {
        $recordToDelete = $project;
    	$project->delete();

         flash()->success(sprintf('%s has been successfully deleted.', $recordToDelete->name));
    	return redirect()->route('dashboard.developers.index', $developer->id);
    }

}
