<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressExamComponent extends Component
{
    /**
     * Create a new component instance.
     */


    public int $step;

    public int $total;


    public $progress = 0;
    public function __construct(int $step = 0, int $total = 5)
    {
        $this->step = $step;
        $this->total = $total;

        $this->progress = ($this->step / $this->total) * 100;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-exam-component');
    }
}
