<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Events\UserSendsMessageThroughContactForm;
use App\Http\Requests;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name'	=> 'required',
    		'email'	=> 'required|email'
    	]);
    	
    	$contact = Contact::create($request->all());

        event( new UserSendsMessageThroughContactForm($contact) );
    	
    	flash()->success('Your message has been successfully sent. We will get back to you soon. Thank you!');
    	return back();
    }
}
