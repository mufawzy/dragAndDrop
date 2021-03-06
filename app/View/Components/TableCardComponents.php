<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableCardComponents extends Component
{
    public $title;
    public $slogan;
    public $pluralModelName;
    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $slogan, $pluralModelName, $items)
    {
        $this->title = $title;
        $this->slogan = $slogan;
        $this->pluralModelName = $pluralModelName;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-card-components');
    }
}
