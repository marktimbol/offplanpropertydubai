<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\Http\Requests;
use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;
use App\Http\Requests\SendInquiryRequest;
use App\Events\UserInquiresAboutTheProject;

class InquiriesController extends Controller
{
    protected $recaptcha;

    public function __construct()
    {
        $this->recaptcha = new ReCaptcha(config('google.recaptcha.secret'));
    }
        
    public function store(SendInquiryRequest $request, $project)
    {
        $g_recaptcha_response = $request->input('g-recaptcha-response');
        $remote_ip = $_SERVER['REMOTE_ADDR'];

        $response = $this->recaptcha->verify($g_recaptcha_response, $remote_ip);
        if( $response->isSuccess() )
        {
            // verified
            $project->load('developer');
            $request['project'] = $project->name;
            $inquiry = Inquiry::create($request->all());

            event( new UserInquiresAboutTheProject($inquiry, $project) );
            
            flash()->success('Your inquiry has been successfully submitted. We will get back to you soon. Thank you!');
            
            return back();
        }

        flash()->error('Oops. Something went wrong. Please try again.');
        return back();
    }
}
