<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductBrowser extends Component
{
    public function getAllProductsProperty()
    {
        return Product::count();
    }

    public function getAllCategoryProperty()
    {
        return Category::count();
    }

    public function getStocks($status)
    {
        return $status === 'out'
            ? Product::with('inventory')->whereHas('inventory', function ($query) {
                $query->where('stock', '=', 0);
            })->get()
            : Product::with('inventory')->whereHas('inventory', function ($query) {
                $query->whereColumn('stock', '<=', 'stock_min_limit')->where('stock', '>', 0);
            })->get();
    }

    public function render()
    {
        return view('livewire.product-browser', [
            'lowStocks' => $this->getStocks('low')->take(5),
            'outStocks' => $this->getStocks('out')->take(5),
        ]);
    }
}
