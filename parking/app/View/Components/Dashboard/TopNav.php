<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class TopNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $nbPlaces)
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
        return view('components.dashboard.top-nav');
    }
}
