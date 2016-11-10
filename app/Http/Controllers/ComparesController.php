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
		$projects = Project::latest()->get();

		return view('public.compares.index', compact('compares', 'projects'));
	}

    public function store(Request $request)
    {
        if( $request->has('project_ids') )
        {
            $project_ids = $request->project_ids;
            foreach( $project_ids as $project_id )
            {
            	$project = Project::findOrFail($project_id);
                $project->load('developer');

                Compare::add($project_id, $project->name, 1, 0, [
                    'project' => $project
                ]);
            }
        }

    	return back();
        
    }

    public function destroy($rowId)
    {
        Compare::remove($rowId);
        // flash()->success('The project has been removed from compare lists');
        return back();
    }
}
