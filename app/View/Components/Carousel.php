<?php

namespace App\View\Components;

use App\Models\SliderImage;
use Illuminate\View\Component;

class Carousel extends Component
{
    public $slides;

    public function __construct()
    {
        $this->slides = SliderImage::where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    public function render()
    {
        return view('components.carousel');
    }
}