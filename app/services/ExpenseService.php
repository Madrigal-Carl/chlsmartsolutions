<?php

namespace App\Services;

use App\Models\Expense;

class ExpenseService
{
    public function getFilteredExpensePaginated($startDate, $endDate, $category)
    {
        return Expense::where('category', $category)
            ->whereBetween('expense_date', [$startDate, $endDate])
            ->orderBy('expense_date', 'desc')
            ->paginate(10);
    }

    public function getFilteredExpense($startDate, $endDate)
    {
        return Expense::whereBetween('expense_date', [$startDate, $endDate])
            ->orderBy('expense_date', 'desc')
            ->get();
    }
}
