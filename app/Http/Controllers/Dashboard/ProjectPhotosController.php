<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectPhotosController extends Controller
{
    public function store(Request $request, $developer, $project)
    {
		// $path = Storage::put(sprintf('developers/%s/%s', $developer->slug, $project->slug), $request->file, 'public');
        $path = $request->file->store(
            sprintf('developers/%s/%s/photos', $developer->slug, str_slug($project->name))
        , 's3');

		$project->photos()->create([
			'photo'	=> $path
		]);
    }

    public function destroy($developer, $project, $photo)
    {    	
    	Storage::delete($photo->photo);
    	$photo->delete();

    	return back();
    }
}
