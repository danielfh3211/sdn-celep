<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashCardmenu extends Controller
{
    public function slider()
    {
        return view('pages.home.slider');
    }
}
