<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyState extends Component
{
    public string $message;

    public string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(string $message, string $icon = '📭')
    {
        $this->message = $message;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.empty-state');
    }
}
