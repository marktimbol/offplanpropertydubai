<?php

namespace App\Http\Controllers\Dashboard;

use App\Country;
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
        $countries = Country::orderBy('name', 'asc')->get();
    	return view('dashboard.developers.create', compact('countries'));
    }

    public function store(CreateDeveloperRequest $request)
    {
    	$developer = Developer::create($request->all());

        flash()->success(sprintf('%s has been successfully saved.', $developer->name));
    	return redirect()->route('dashboard.developers.show', $developer->id);
    }

    public function edit($developer)
    {
        $countries = Country::orderBy('name', 'asc')->get();
        return view('dashboard.developers.edit', compact('developer', 'countries'));
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
