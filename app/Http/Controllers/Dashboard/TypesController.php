<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index()
    {
    	return Type::all();
    }

    public function show($category)
    {
    	return $type;
    }
}
