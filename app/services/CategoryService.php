<?php 

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAllCategory()
    {
        return Category::orderBy('name')->get();
    }
}