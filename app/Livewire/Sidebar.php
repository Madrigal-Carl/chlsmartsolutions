<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $items = [];
    public $active = '';

    public function mount($items = [])
    {
        $this->items = $items;
        $this->active = $items[0]['label'] ?? '';
    }

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
