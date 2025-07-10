<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
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

    public function getSortedSales($type, $category_id, $search = '')
    {
        return Product::with(['category'])
            ->with(['orderProducts' => function ($query) use ($type) {
                if ($type != 'all') {
                    $query->whereHas('order', function ($q) use ($type) {
                        $q->where('type', $type);
                    });
                }
            }, 'orderProducts.order'])
            ->whereHas('orderProducts.order', function ($query) use ($type) {
                if ($type != 'all') {
                    $query->where('type', $type);
                }
            })
            ->when($category_id != 0, function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })
            ->when($search != '', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'asc')
            ->paginate(8);
    }
}
