<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileControl extends Controller
{
    public function index()
    {
        return view('profile');
    }
}