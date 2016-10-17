<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendInquiryRequest;
use App\Events\UserInquiresAboutTheProject;

class InquiriesController extends Controller
{
    public function store(SendInquiryRequest $request)
    {
    	$inquiry = Inquiry::create($request->all());

    	event( new UserInquiresAboutTheProject($inquiry) );
    	
    	// flash()->success('Your inquiry has been successfully submitted. We will get back to you soon. Thank you!');
    	
    	return redirect()->route('home');
    }
}
