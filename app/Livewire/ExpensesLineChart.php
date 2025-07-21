<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Expense;
use Livewire\Component;

class ExpensesLineChart extends Component
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
        $expenses = Expense::selectRaw('category, amount, DATE(expense_date) as date')
            ->whereBetween('expense_date', [$this->startDate, now()])
            ->orderBy('expense_date')
            ->get()
            ->groupBy('category');

        $series = [];

        foreach ($expenses as $expense => $typeExpense) {
            $data = $typeExpense->map(fn($exp) => [
                'x' => Carbon::parse($exp->date)->format('Y-m-d'),
                'y' => (float) $exp->amount
            ])->values()->all();

            $series[] = [
                'name' => ucfirst($expense),
                'data' => $data
            ];
        }

        return $series;
    }

    public function render()
    {
        return view('livewire.expenses-line-chart');
    }
}
