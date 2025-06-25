<?php

namespace App\Services;

use App\Models\Product;

class ProductService 
{
    public function getAllProducts()
    {
        return Product::with('category')
            ->orderBy('name', 'asc')->paginate(8);
    }

    public function getSortedProducts($category_id, $search = '')
    {
        return Product::with('category')
            ->when($category_id != 0, function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('name', 'asc')
            ->paginate(8);
    }

}