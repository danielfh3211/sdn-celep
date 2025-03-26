<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashCardMenu extends Component
{
    public $title;
    public $href;
    public $active;

    public function __construct($title, $href, $active = false)
    {
        $this->title = $title;
        $this->href = $href;
        $this->active = $active;
    }

    public function render()
    {
        return view('components.dash-card-menu');
    }
}