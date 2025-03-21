<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function getSlides()
    {
        return [
            [
                'image' => 'assets/img/carousel/slide1.jpg',
                ],
            [
                'image' => 'assets/img/carousel/slide2.jpg',
                ],
            [
                'image' => 'assets/img/carousel/slide3.jpg',
                ],
            // Add more slides as needed
        ];
    }
}
