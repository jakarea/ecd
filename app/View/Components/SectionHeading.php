<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionHeading extends Component
{
    // Props available in Blade
    public string $width;
    public string $pretitle;
    public string $title;
    public ?string $description;
    // public string $pretitleBgClass;
    // public string $innerClass;
    // public string $titleClass;
    // public string $descClass;

    /**
     * Create a new component instance.
     *
     * @param string $maxWidth tailwind max-width class, e.g. 'max-w-[566px]' or 'max-w-3xl'
     * @param string $pretitle small badge text
     * @param string $title main heading (can contain HTML if you pass trusted HTML)
     * @param string|null $description subtitle/paragraph
     * @param string $pretitleBgClass background class for the badge
     * @param string $innerClass extra classes for badge container
     * @param string $titleClass classes for title
     * @param string $descClass classes for description
     */
    public function __construct(
        string $width = 'max-w-[566px]',
        string $pretitle = 'Our Teams',
        string $title = 'Meet Our Dedicated Team',
        ?string $description = 'Introducing our dedicated team of car care professionals in the Netherlands, ready to serve you with expertise and passion.',
        // string $titleClass = 'text-[34px] font-extrabold leading-[1.2] tracking-[0.02px] text-[var(--color-heading)] mb-4',
    ) {
        $this->width = $width;
        $this->pretitle = $pretitle;
        $this->title = $title;
        $this->description = $description;
        // $this->titleClass = $titleClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section-heading');
    }
}
