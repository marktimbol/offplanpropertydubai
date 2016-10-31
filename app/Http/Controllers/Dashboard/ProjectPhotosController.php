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
<<<<<<< HEAD
		// $path = Storage::put(sprintf('developers/%s/%s', $developer->slug, $project->slug), $request->file, 'public');
        $path = $request->file->store(
            sprintf('developers/%s/%s/photos', $developer->slug, str_slug($project->name))
        , 's3');
=======
        $uploadPath = sprintf('developers/%s/%s/photos', $developer->slug, str_slug($project->name));
        $path = $request->file->store($uploadPath, 's3');
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758

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
