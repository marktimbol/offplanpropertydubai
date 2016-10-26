<?php

namespace App\Http\Controllers;

use App\Community;
use App\Http\Requests;
use Illuminate\Http\Request;

class CommunitiesController extends Controller
{
    public function index()
    {
    	$communities = Community::all();
    	return view('public.communities.index', compact('communities'));
    }
}
