<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\KataPengantar;
use App\Models\SliderImage;

class HomeController extends Controller
{
    public function index()
    {
        $sliderImage = SliderImage::all();
        $kataPengantar = KataPengantar::first();
        
        return view('homepage', compact('sliderImage', 'kataPengantar'));
    }
}
