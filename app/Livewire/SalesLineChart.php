<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;

class SalesLineChart extends Component
{
    public $chartData;
    public $startDate;

    public function mount($date)
    {
        $this->startDate = $date;
        $this->chartData = $this->getChartData();
    }

    public function getChartData()
    {
        $orders = Order::selectRaw('type, total_amount, DATE(created_at) as date')
            ->whereBetween('updated_at', [$this->startDate, now()])
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

    public function render()
    {
        return view('livewire.sales-line-chart');
    }
}
