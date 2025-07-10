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
        $products = Product::with(['category', 'orderProducts.order'])
            ->when($type != 'all', function ($query) use ($type) {
                $query->whereHas('orderProducts.order', fn($q) => $q->where('type', $type));
            })
            ->when($category_id != 0, fn($q) => $q->where('category_id', $category_id))
            ->when($search != '', fn($q) => $q->where('name', 'like', '%' . $search . '%'))
            ->get();

        $transformed = $products->map(function ($product) use ($type) {
            $grouped = $product->orderProducts
                ->groupBy(fn($op) => $op->order->type)
                ->map(fn($group) => $group->sum('quantity'))
                ->sortDesc();

            $selectedType = 'N/A';
            $quantity = 0;

            if ($grouped->isNotEmpty()) {
                $selectedType = $grouped->keys()->first();
                $quantity = $grouped->first();
            }

            return (object)[
                'product' => $product,
                'type' => $selectedType,
                'quantity' => $quantity,
                'total' => $quantity * $product->price,
            ];
        });

        $sorted = $transformed->sortByDesc('total')->values();

        $perPage = 8;
        $currentPage = Paginator::resolveCurrentPage('page');
        $paged = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->values();

        return new LengthAwarePaginator(
            $paged,
            $sorted->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
                'pageName' => 'page',
            ]
        );
    }
}
