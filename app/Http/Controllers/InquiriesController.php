<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\Project;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendInquiryRequest;
use App\Events\UserInquiresAboutTheProject;

class InquiriesController extends Controller
{
    public function store(SendInquiryRequest $request, Project $project)
    {
    	$inquiry = Inquiry::create($request->all());

    	$project->load('developer');
    	event( new UserInquiresAboutTheProject($inquiry, $project) );
    	
    	flash()->success('Your inquiry has been successfully submitted. We will get back to you soon. Thank you!');
    	
    	return back();
    }
}
