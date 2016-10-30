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
        $uploadPath = sprintf('developers/%s/%s/photos', $developer->slug, str_slug($project->name));
        $path = $request->file->store($uploadPath, 's3');

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
