<?php

namespace App\Http\Controllers;

use App\Models\Experience;

class HomeController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('home.home', compact('experiences'));
    }
}
