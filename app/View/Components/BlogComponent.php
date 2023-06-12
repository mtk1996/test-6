<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $catId;
    public function __construct($title, $catId)
    {
        $this->title = $title;
        $this->catId = $catId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-component');
    }
}
