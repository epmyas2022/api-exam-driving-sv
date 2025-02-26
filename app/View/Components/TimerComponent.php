<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TimerComponent extends Component
{
    /**
     * Create a new component instance.
     */


     public  $time;
    public function __construct($time)
    {
        $this->time = $time;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.timer-component');
    }
}
