<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExamCardComponent extends Component
{
    /**
     * Create a new component instance.
     */


     public string $image;

     public string $title;
    public function __construct(string $image, string $title)
    {
        $this->image = $image;
        $this->title = $title;
    }



    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.exam-card-component');
    }
}
