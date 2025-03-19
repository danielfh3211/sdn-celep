<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardNews extends Component
{
    public $videoUrl;
    public $title;
    public $description;

    public function __construct($videoUrl, $title, $description)
    {
        $this->videoUrl = $videoUrl;
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.card-news');
    }
}
