<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;
use App\Events\UserSubmitsAGeneralInquiry;
use App\Http\Requests\SendInquiryRequest;

class GeneralInquiriesController extends Controller
{
    public function store(SendInquiryRequest $request)
    {
    	$request['project'] = 'General Inquiry';
        $inquiry = Inquiry::create($request->all());

    	event( new UserSubmitsAGeneralInquiry($inquiry) );
    	
    	flash()->success('Your inquiry has been successfully submitted. We will get back to you soon. Thank you!');
    	
    	return back();
    }
}
