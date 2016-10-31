<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectFloorPlansController extends Controller
{
    public function store(Request $request, $developer, $project)
    {
    	foreach( $request->file as $file )
    	{
    		$path = $file->store(
	    		sprintf('developers/%s/%s/floorplans', $developer->slug, str_slug($project->name))
    		, 's3');

    		$title = explode('.', $file->getClientOriginalName());

    		$project->floorplans()->create([
    			'title'	=> $title[0],
    			'photo'	=> $path
    		]);
    	}
    }

<<<<<<< HEAD
    public function destroy()
    {

=======
    public function destroy($developer, $project, $floorplan)
    {
        $floorplan->delete();

        flash()->success('Floorplan has been successfully removed.');
        return back();
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
    }
}
