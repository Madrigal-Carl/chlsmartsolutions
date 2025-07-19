<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Task;
use App\Models\Product;
use Livewire\Component;

class DashboardOverview extends Component
{
    public function getTotalProductProperty()
    {
        return Product::count();
    }

    public function getTaskTodayProperty()
    {
        return Task::whereDate('created_at', '<=', now())
            ->whereDate('expiry_date', '>=', now())
            ->where('status', 'pending')
            ->count();
    }

    public function getOrderTodayProperty()
    {
        return Order::whereDate('created_at', '<=', now())
            ->whereDate('expiry_date', '>=', now())
            ->where('status', 'pending')
            ->count();
    }

    public function getSalesTodayProperty()
    {
        return Order::whereDate('updated_at', now())
            ->where('status', 'completed')
            ->sum('total_amount');
    }

    public function getTotalRevenueProperty()
    {
        return Order::where('status', 'completed')
            ->sum('total_amount');
    }

    public function render()
    {
        return view('livewire.dashboard-overview');
    }
}
