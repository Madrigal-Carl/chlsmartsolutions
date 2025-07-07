<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\OrderService;

class OrderBrowser extends Component
{
    use WithPagination;
    public $selectedStatus = 0;
    public $search = '';
    public $selectedOrder = null;
    public $showModal = true;

    public function selectOrder($order_id)
    {
        $this->showModal = true;
        $this->selectedOrder = Order::with('orderProducts.product')->find($order_id);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedOrder = null;
    }

    public function render(OrderService $orderService)
    {
        $orders = $orderService->getFilteredOrders($this->selectedStatus, $this->search);
        return view('livewire.order-browser',[
            'orders' => $orders
        ]);
    }
}
