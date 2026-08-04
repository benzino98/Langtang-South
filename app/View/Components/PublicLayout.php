<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PublicLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title = null,
        public ?string $metaDescription = null,
        public ?string $metaKeywords = null,
        public ?string $ogTitle = null,
        public ?string $ogDescription = null,
        public ?string $ogType = null,
        public ?string $ogImage = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.public');
    }
}
