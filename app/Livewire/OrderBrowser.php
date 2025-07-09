<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Notification;
use Livewire\WithPagination;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;

class OrderBrowser extends Component
{
    use WithPagination;
    public $selectedStatus = 0;
    public $search = '';
    public $selectedOrder = null;
    public $showModal = false;
    public string $activeTab = 'addOrder';

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

    public function updateStatus($id)
    {
        $order = Order::find($id);
        if ($order->status == 'pending'){
            $order->status = 'completed';
            $order->save();

            app(NotificationService::class)->createNotif(
                Auth::user()->id,
                'Order Completed',
                "{$order->reference_id} ordered by {$order->user->fullname} has been successfully completed.",
                ['admin', 'cashier', 'admin_officer'],
            );

            notyf()->success('Order has been completed.');
            $this->dispatch('notificationRead')->to('sidebar');
            $this->closeModal();
            return;
        }elseif ($order->status == 'completed') {
            notyf()->error('Order already been completed.');
            return;
        }

        notyf()->error('Order has expired.');
    }
}
