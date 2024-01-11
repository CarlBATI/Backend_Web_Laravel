<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsItem extends Component
{
    public $newsItem;
    /**
     * Create a new component instance.
     */
    public function __construct($newsItem)
    {
        $this->newsItem = $newsItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-item');
    }
}
