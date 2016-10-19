<?php

namespace App\Http\Controllers\Dashboard;

use App\Developer;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateDeveloperRequest;
use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    public function index()
    {
    	$developers = Developer::latest()->get();
    	return view('dashboard.developers.index', compact('developers'));
    }

    public function show($developer)
    {        
        return view('dashboard.developers.show', compact('developer'));
    }

    public function create()
    {
    	return view('dashboard.developers.create');
    }

    public function store(CreateDeveloperRequest $request)
    {
    	$developer = Developer::create($request->all());

        flash()->success(sprintf('%s has been successfully saved.', $developer->name));
    	return redirect()->route('dashboard.developers.show', $developer->id);
    }

    public function edit($developer)
    {
        return view('dashboard.developers.edit', compact('developer'));
    }

    public function update(CreateDeveloperRequest $request, $developer)
    {
        $developer->update($request->all());
        
        flash()->success(sprintf('%s has been successfully updated.', $developer->name));
        return redirect()->route('dashboard.developers.show', $developer->id);
    }

    public function destroy($developer)
    {
        $recordToDelete = $developer;
        $developer->delete(); 

        flash()->success(sprintf('%s has been successfully deleted.', $recordToDelete->name));
        return redirect()->route('dashboard.developers.index');
    }
}
