<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSection extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $bgImage;
    public $bgColor;

    public function __construct($title, $bgImage, $bgColor = 'white')
    {
        $this->title = $title;
        $this->bgImage = $bgImage;
        $this->bgColor = $bgColor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-section');
    }
}
