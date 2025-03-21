<?php

namespace Database\Seeders;

use App\Models\CarouselImage;
use Illuminate\Database\Seeder;

class CarouselImageSeeder extends Seeder
{
    public function run()
    {
        $images = [
            [
                'image' => 'assets/img/carousel/pramuka1.jpg',
                'category' => 'pramuka',
                'order' => 1
            ],
            [
                'image' => 'assets/img/carousel/pramuka2.jpg',
                'category' => 'pramuka',
                'order' => 2
            ],
            // Add more images as needed
        ];

        foreach ($images as $image) {
            CarouselImage::create($image);
        }
    }
}

