<?php

namespace App\Http\Controllers;

use App\Compare;
use Illuminate\Http\Request;

class ResetCompareController extends Controller
{
    public function destroy()
    {
    	Compare::destroy();

    	return back();
    }
}
