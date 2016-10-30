<?php

namespace App\Http\Controllers\Dashboard;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
    	$contacts = Contact::latest()->get();
    	return view('dashboard.contacts.index', compact('contacts'));
    }
}
