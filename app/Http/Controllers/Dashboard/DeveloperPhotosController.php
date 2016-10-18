<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeveloperPhotosController extends Controller
{
    public function store(Request $request, $developer)
    {
		$file = Storage::put('developers', $request->file, 'public');

		$developer->photo = $file;
		$developer->save();
    }
}
