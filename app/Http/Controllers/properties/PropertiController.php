<?php

namespace App\Http\Controllers\properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertiController extends Controller
{
    public function index()
    {
        return view('properties.index');
    }

    public function create(){
        return view('properties.create');
    }
    //
}
