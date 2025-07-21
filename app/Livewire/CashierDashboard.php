<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class CashierDashboard extends Component
{
    public $chartData;

    public function mount()
    {
        $this->chartData = $this->getChartData();
    }

    public function getChartData()
    {
        $orders = Order::selectRaw('type, total_amount, DATE(created_at) as date')
            ->where('status', 'completed')
            ->orderBy('created_at')
            ->get()
            ->groupBy('type');

        $typeLabels = [
            'walk_in' => 'Walk-In',
            'online' => 'Online',
            'government' => 'Government',
            'project_based' => 'Project-Based',
        ];

        $series = [];

        foreach ($orders as $type => $typeOrders) {
            $data = $typeOrders->map(fn($order) => [
                'x' => Carbon::parse($order->date)->format('Y-m-d'),
                'y' => (float) $order->total_amount
            ])->values()->all();

            $series[] = [
                'name' => $typeLabels[$type] ?? ucfirst($type),
                'data' => $data
            ];
        }

        return $series;
    }

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

        return view('livewire.cashier-dashboard');
    }
}
