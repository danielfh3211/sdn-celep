<?php

namespace App\View\Components;

use App\Models\CarouselImage;
use Illuminate\View\Component;

class Carousel extends Component
{
    public $slides;

    public function __construct($category = null)
    {
        $this->slides = CarouselImage::where('is_active', true)
            ->when($category, function($query) use ($category) {
                return $query->where('category', $category);
            })
            ->orderBy('order')
            ->get();
    }

    public function render()
    {
        return view('components.carousel');
    }
}