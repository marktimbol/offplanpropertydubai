<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectTypesController extends Controller
{
    public function store(Request $request, $developer, $project)
    {
    	$project->types()->attach($request->type_id);

    	return back();
    }

    public function destroy($developer, $project, $type)
    {
    	$project->types()->detach($type);

    	return back();
    }
}
