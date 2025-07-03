<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $active = 'task';

    public function setActive($option)
    {
        $this->active = $option;
        $this->dispatch('setActive', $option);
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
