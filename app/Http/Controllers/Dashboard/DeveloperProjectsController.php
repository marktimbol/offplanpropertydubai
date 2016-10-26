<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Community;
use App\Country;
use App\Developer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use JavaScript;

class DeveloperProjectsController extends Controller
{
    public function index($developer)
    {
        // dd($developer);
    }

	public function show($developer, $project)
	{          
        $project->load('communities.city.country');
        
		return view('dashboard.projects.show', compact('developer', 'project'));
	}

	public function create($developer)
	{
        JavaScript::put([
            'developer' => $developer,
            'categories' => Category::all(),
            'countries' => Country::orderBy('name', 'asc')->get(),
        ]);

        // $filtered = $collection->only(['product_id', 'name']);

		return view('dashboard.projects.create', compact('developer'));
	}

    public function store(CreateProjectRequest $request, $developer)
    {
    	$project = $developer->projects()->create($request->all());
        
        if( $request->has('type_ids') ) {
            $project->types()->attach($request->type_ids);
        }

        if( $request->has('community_id') ) {
            $community = Community::findOrFail($request->community_id);
            $community->projects()->attach($project);
        }

        return $project;
        
        // flash()->success(sprintf('%s has been successfully saved.', $project->name));
    	// return redirect()->route('dashboard.developers.projects.show', [$developer->id, $project->id]);
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
    	return redirect()->route('dashboard.developers.show', $developer->id);
    }

}
