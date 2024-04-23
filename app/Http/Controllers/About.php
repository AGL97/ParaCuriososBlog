<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class About extends Controller
{
    public function displayView():View{
        return view('about');
    }    
}
