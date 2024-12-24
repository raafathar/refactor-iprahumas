<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string|null $title
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title ? $title . ' · ' . config('app.name') : config('app.name');
    }


    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
