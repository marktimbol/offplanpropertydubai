<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeLanguageController extends Controller
{
    public function index($locale)
    {
    	session(['locale' => $locale]);

    	return back();
    }
}
