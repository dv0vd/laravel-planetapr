<?php

declare(strict_types=1);

namespace App\View\Components\Admin\NewsImageResource;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsImageComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $image
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.news-image-resource.news-image-component');
    }
}
