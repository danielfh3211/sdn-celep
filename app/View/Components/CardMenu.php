<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardMenu extends Component
{
    public $title;
    public $href;
    public $backgroundImage;

    public function __construct($title, $href, $backgroundImage )
    {
        $this->title = $title;
        $this->href = $href;
        $this->backgroundImage = $backgroundImage;
    }

    public function render()
    {
        return view('components.card-menu');
    }
}