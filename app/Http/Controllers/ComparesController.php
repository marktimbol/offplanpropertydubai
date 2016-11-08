<?php

namespace App\Http\Controllers;

use App\Compare;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class ComparesController extends Controller
{
	public function index()
	{
		$compares = Compare::all();

		return view('public.compares.index', compact('compares'));
	}

    public function store(Request $request)
    {
    	$project_id = $request->project_id;
    	$project = Project::findOrFail($project_id);
        $project->load('developer');

    	Compare::add($project_id, $project->name, 1, 0, [
    		'project' => $project
    	]);

    	flash()->success(sprintf('%s has been added to compare', $project->name));
    	return back();
    }

    public function destroy($rowId)
    {
        Compare::remove($rowId);

        flash()->success('The project has been removed from compare lists');
        return back();
    }
}
