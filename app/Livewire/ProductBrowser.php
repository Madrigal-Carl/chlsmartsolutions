<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Livewire\Cart;

class ProductBrowser extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = 0;
    public $categories = [];
    public $showModal = false;
    public $selectedProduct = null;


    public function updated($property)
    {
        if ($property === 'selectedCategory' || $property === 'search') {
            $this->resetPage();
        }
    }
    public function mount(CategoryService $categoryService)
    {
        $this->categories = $categoryService->getAllCategory();
    }

    public function resetPage()
    {
        $this->gotoPage(1);
    }

    public function selectProduct($productId)
    {
        $this->selectedProduct = Product::with('category', 'inventory')->find($productId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedProduct = null;
    }

    public function addToCart()
    {
        if ($this->selectedProduct->inventory->stock > 0) {
            $this->dispatch('addToCart', ['id' => $this->selectedProduct->id])
                ->to(Cart::class);
        }

        $this->closeModal();
    }

    public function render(ProductService $productService)
    {

        $products = $productService->getSortedProducts($this->selectedCategory, $this->search);

        return view('livewire.product-browser', [
            'products' => $products
        ]);
    }
}
