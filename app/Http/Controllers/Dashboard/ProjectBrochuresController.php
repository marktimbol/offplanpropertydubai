<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectBrochuresController extends Controller
{
    public function store(Request $request, $developer, $project)
    {    	
        $project->brochure()->create([
            'file' => $request->file
        ]);

        flash()->success('Brochure has been successfully saved.');
        return back();
    }

    public function update(Request $request, $developer, $project, $brochure)
    {       
        $brochure->update([
            'file' => $request->file
        ]);

        flash()->success('Brochure has been successfully updated.');
        return back();
    }

    public function destroy($developer, $project, $brochure)
    {       
        $brochure->delete();

        flash()->success('Brochure has been successfully removed.');
        return back();
    }
}
