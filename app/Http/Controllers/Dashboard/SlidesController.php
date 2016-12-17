<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
	public function index()
	{
		$slides = Slide::latest()->get();

		return view('dashboard.slides.index', compact('slides'));
	}

    public function store(Request $request)
    {
        $path = $request->file->store('/slides', 's3');
        
        Slide::create([
        	'path'	=> $path
        ]);

        return back();
    }

    public function destroy(Slide $slide)
    {
        Storage::delete($slide->path);

        $slide->delete();

        flash()->success('Slide has been successfully deleted.');
        
        return back();
    }
}

