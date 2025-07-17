<?php

namespace App\Livewire;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ExpenseService;
use Livewire\WithoutUrlPagination;

class ExpenseBrowser extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $category = 'monthly dues';
    public $showModal = false;
    protected $listeners = ['cancel' => 'closeModal'];
    public $selectedDate = 'today';
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->setToday();
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function updated($property)
    {
        if ($property === 'selectedStatus' || $property === 'search') {
            $this->gotoPage(1);
        }
    }

    public function updatedSelectedDate($value)
    {
        match ($value) {
            'today' => $this->setToday(),
            'this_week' => $this->setThisWeek(),
            'this_month' => $this->setThisMonth(),
            'this_year' => $this->setThisYear(),
            default => null,
        };
    }

    protected function setToday()
    {
        $this->startDate = now()->toDateString();
        $this->endDate = now()->toDateString();
    }

    protected function setThisWeek()
    {
        $this->startDate = now()->startOfWeek()->toDateString();
        $this->endDate = now()->toDateString();
    }

    protected function setThisMonth()
    {
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->toDateString();
    }

    protected function setThisYear()
    {
        $this->startDate = now()->startOfYear()->toDateString();
        $this->endDate = now()->toDateString();
    }

    public function getExpenseProperty()
    {
        return Expense::all();
    }

    public function render(ExpenseService $expenseService)
    {
        return view('livewire.expense-browser', [
            'data' => $expenseService->getFilteredExpense($this->startDate, $this->endDate),
            'expenses' => $expenseService->getFilteredExpensePaginated($this->startDate, $this->endDate, $this->category),
        ]);
    }
}
