<?php

namespace App\Exports;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExpensesExport implements FromView
{
    protected $startDate;

    public function __construct($startDate)
    {
        $this->startDate = $startDate;
    }

    public function view(): View
    {
        $expenses = Expense::selectRaw('category, DATE(expense_date) as date, SUM(amount) as amount')
            ->whereBetween('expense_date', [$this->startDate, now()])
            ->groupBy('category', DB::raw('DATE(expense_date)'))
            ->orderBy('date')
            ->get();

        return view('exports.expenses', ['expenses' => $expenses]);
    }
}
