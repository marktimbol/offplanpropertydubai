<?php

namespace App\Http\Controllers\Dashboard;

use App\Photo;
use App\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CommunityPhotosController extends Controller
{
    public function store(Request $request, Community $community)
    {
        $uploadPath = sprintf('communities/%s/photos', $community->slug);
        $path = $request->file->store($uploadPath, 's3');

        $community->photo = $path;
        $community->save();
    }

    public function destroy(Community $community, Photo $photo)
    {
    	Storage::delete($community->photo);

    	$community->photo = '';
    	$community->save();

    	return back();
    }
}
