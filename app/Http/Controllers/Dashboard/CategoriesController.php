<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::latest()->get();
    	return view('dashboard.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
    	Category::create($request->all());

    	flash()->success($request->name .' has been successfully saved.');
    	return back();
    }

    public function show($category)
    {
    	return $category;
    }

    public function destroy($category)
    {
        $category->delete();

        flash()->success('Category has been successfully removed.');
        return back(); 
    }

}
