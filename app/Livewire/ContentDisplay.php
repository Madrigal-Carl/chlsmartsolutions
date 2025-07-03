<?php

namespace App\Livewire;

use Livewire\Component;

class ContentDisplay extends Component
{
    public $active = 'task';

    protected $listeners = ['setActive' => 'updateActive'];

    public function updateActive($option)
    {
        $this->active = $option;
    }

    public function render()
    {
        return view('livewire.content-display');
    }
}

