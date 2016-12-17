<?php

namespace App\Http\Controllers\Dashboard;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidesController extends Controller
{
	public function index()
	{
		$slides = Slide::latest()->get();

		return view('dashboard.slides.index', compact('slides'));
	}
}
