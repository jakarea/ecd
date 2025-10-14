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
    public $pageId;
    public $title;
    public $subtitle;
    public $bgImage;
    public $bgColor;
    public $showSocialIcons;

    public function __construct(
        $pageId = null,
        $title = null,
        $subtitle = null,
        $bgImage = null,
        $bgColor = null,
        $showSocialIcons = false
    ) {
        $this->pageId = $pageId;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->bgImage = $bgImage;
        $this->bgColor = $bgColor;
        $this->showSocialIcons = $showSocialIcons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-section');
    }
}
