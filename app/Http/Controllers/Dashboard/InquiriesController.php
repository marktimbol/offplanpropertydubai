<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Inquiry;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
    public function index()
    {
    	$inquiries = Inquiry::latest()->get();
    	return view('dashboard.inquiries.index', compact('inquiries'));
    }
}
