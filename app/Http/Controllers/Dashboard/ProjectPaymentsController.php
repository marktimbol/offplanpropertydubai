<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectPaymentsController extends Controller
{
    public function store(Request $request, $developer, $project)
    {
    	$project->payments()->create($request->all());

    	flash()->success('Payment plan has been successfully saved.');
    	return back();
    }

    public function destroy($developer, $project, $payment)
    {
    	$payment->delete();
    	return back();
    }
}
