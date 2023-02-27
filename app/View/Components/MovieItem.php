<?php

namespace App\View\Components;

use App\Models\Movie;
use Illuminate\View\Component;

class MovieItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Movie $movie)
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
        return view('components.movie-item');
    }
}
