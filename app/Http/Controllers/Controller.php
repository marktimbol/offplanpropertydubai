<?php

namespace App\Http\Controllers;

use App\Developer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	$developers = Cache::remember('footer_developers', 30, function() {
    		return Developer::latest()->get();
    	});
    	
    	View::share('developers', $developers);
    }
}
