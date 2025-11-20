<?php

namespace App\View\Components;

use App\Models\FaithCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCard extends Component
{
    public FaithCategory $category;

    /**
     * Create a new component instance.
     */
    public function __construct(FaithCategory $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-card');
    }
}
