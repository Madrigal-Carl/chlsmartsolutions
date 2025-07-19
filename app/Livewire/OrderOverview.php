<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderOverview extends Component
{
    public $active = '';

    public function setActive($option)
    {
        $this->active = $option;
        session()->put('sidebar_active', $option);
        $this->dispatch('activate', $option)->to('sidebar');
    }

    public function render()
    {
        $order = Order::whereDate('created_at', '<=', now())
            ->whereDate('expiry_date', '>=', now())
            ->where('status', 'pending')
            ->take(2)
            ->get();

        return view('livewire.order-overview', [
            'orders' => $order,
        ]);
    }
}
