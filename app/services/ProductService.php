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
        return Product::with([
            'category',
            'orderProducts' => function ($query) use ($type) {
                $query->whereHas('order', function ($q) use ($type) {
                    $q->where('status', 'completed');

                    if ($type !== 'all') {
                        $q->where('type', $type);
                    }
                });
            },
            'orderProducts.order'
        ])
        ->whereHas('orderProducts.order', function ($query) use ($type) {
            $query->where('status', 'completed');

            if ($type !== 'all') {
                $query->where('type', $type);
            }
        })
        ->when($category_id != 0, function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })
        ->when($search !== '', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->orderBy('created_at', 'asc')
        ->paginate(8);
    }

    public function getTopSellingProduct()
    {
        return Product::with('orderProducts.order', 'category')->whereHas('orderProducts.order', function($query) {
            $query->where('status', 'completed')
                ->where('created_at', '<=', now())
                ->where('created_at', '>=', now()->subWeeks(2));
        });
    }
}
