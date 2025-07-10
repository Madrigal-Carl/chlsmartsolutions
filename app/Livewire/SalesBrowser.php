<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ProductService;
use App\Services\CategoryService;
use Livewire\WithoutUrlPagination;

class SalesBrowser extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $categories = [];
    public $search = '';
    public $selectedCategory = 0;
    public $selectedType = 'all';

    public function mount(CategoryService $categoryService)
    {
        $this->categories = $categoryService->getAllCategory();
    }

    public function updated($property)
    {
        if (in_array($property, ['selectedCategory', 'search', 'selectedType'])) {
            $this->gotoPage(1);
        }
    }

    public function getSales($type)
    {
        $orders = Order::where('type', $type)->get();
        $total = 0;
        foreach($orders as $order){
            $total += $order->total_amount;
        }
        return $total;
    }

    public function render(ProductService $productService)
    {
        $products = $productService->getSortedSales($this->selectedType, $this->selectedCategory, $this->search);

        return view('livewire.sales-browser', [
            'products' => $products,
        ]);
    }
}
