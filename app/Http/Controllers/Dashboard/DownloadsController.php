<?php

namespace App\Http\Controllers\Dashboard;

use App\Download;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function index()
    {
    	$downloads = Download::latest()->get();
    	return view('dashboard.downloads.index', compact('downloads'));
    }
}
