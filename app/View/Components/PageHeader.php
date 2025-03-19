<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $subtitle;
    public $backgroundImage;

    public function __construct($title, $subtitle = null, $backgroundImage = '/school-banner.jpg')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->backgroundImage = $backgroundImage;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
