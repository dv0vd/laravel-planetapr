<?php

declare(strict_types=1);

namespace App\View\Components\Admin\NewsResource;

use App\Models\News;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsImagesComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly News $news
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.news-resource.news-images-component');
    }
}
