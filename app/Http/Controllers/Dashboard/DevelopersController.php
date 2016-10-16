<?php

namespace App\Http\Controllers\Dashboard;

use App\Developer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevelopersController extends Controller
{
    public function index()
    {
    	$developers = Developer::latest()->get();
    	return view('dashboard.developers.index', compact('developers'));
    }

    public function show(Developer $developer)
    {        
        return view('dashboard.developers.show', compact('developer'));
    }

    public function create()
    {
    	return view('dashboard.developers.create');
    }

    public function store(Request $request)
    {
    	Developer::create($request->all());

    	return redirect()->route('dashboard.developers.create');
    }

    public function edit(Developer $developer)
    {
        return view('dashboard.developers.edit', compact('developer'));
    }

    public function update(Request $request, Developer $developer)
    {
        $developer->update($request->all());
        // Flash message
        return back();
    }

    public function destroy(Developer $developer)
    {
        $developer->delete();

        return redirect()->route('dashboard.developers.index');
    }
}
