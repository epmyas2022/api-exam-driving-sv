<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxComponent extends Component
{
    /**
     * Create a new component instance.
     */



     public string $text;
     public int $id;

    public function __construct(string $text, int $id)
    {
        $this->text = $text;
        $this->id = $id;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox-component');
    }
}
