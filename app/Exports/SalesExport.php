<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesExport implements FromView
{
    protected $startDate;

    public function __construct($startDate)
    {
        $this->startDate = $startDate;
    }

    public function view(): View
    {
        $orders = Order::selectRaw('type, DATE(created_at) as date, SUM(total_amount) as total_amount')
            ->whereBetween('updated_at', [$this->startDate, now()])
            ->where('status', 'completed')
            ->groupBy('type', DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        return view('exports.sales', ['orders' => $orders]);
    }
}
