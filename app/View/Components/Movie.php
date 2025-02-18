<?php

namespace App\View\Components;

use App\Models\Movie as ModelMovie;
use Illuminate\View\Component;

class Movie extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ModelMovie $movie)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.movie');
    }
}
