<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class CashierDashboard extends Component
{
    public $active = '';
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

    public function setActive($option)
    {
        $this->active = $option;
        session()->put('sidebar_active', $option);
        $this->dispatch('activate', $option)->to('sidebar');
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

    public function getStocks()
    {
        $products = Product::with('inventory', 'orderProducts.order')->get();

        return $products->filter(function ($product) {
            $inventory = $product->inventory;

            $pendingQuantity = $product->orderProducts
                ->where('order.status', 'pending')
                ->sum('quantity');

            $adjustedStock = $inventory->stock + $pendingQuantity;

            return $adjustedStock === 0 || $adjustedStock <= $inventory->stock_min_limit;
        })->take(2)->values();
    }

    public function render()
    {
        $tasks = Task::whereDate('created_at', '<=', now())
                ->whereDate('expiry_date', '>=', now())
                ->where('status', 'pending')
                ->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")
                ->take(2)
                ->get();

        $order = Order::whereDate('created_at', '<=', now())
            ->whereDate('expiry_date', '>=', now())
            ->where('status', 'pending')
            ->take(2)
            ->get();

        return view('livewire.cashier-dashboard', [
            'orders' => $order,
            'products' => $this->getStocks(),
            'tasks' => $tasks,
        ]);
    }
}
