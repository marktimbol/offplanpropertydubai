<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryTypesController extends Controller
{
    public function index($category)
    {
    	$types = $category->types;
    	return view('dashboard.types.index', compact('category', 'types'));
    }

    public function store(Request $request, $category)
    {
    	$category->types()->create($request->all());
    	
    	flash()->success('Project type has been successfully saved.');
    	return back();
    }

    public function destroy($category, $type)
    {
        $type->delete();

        flash()->success('Project type has been successfully removed.');
        return back();
    }
}
