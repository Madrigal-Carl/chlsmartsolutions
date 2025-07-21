<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Inventory;
use Livewire\WithFileUploads;
use App\Services\CategoryService;
use Illuminate\Validation\ValidationException;

class ProductForm extends Component
{
    use WithFileUploads;
    public $name;
    public $categoryId;
    public $price;
    public $stock;
    public $stock_min_limit;
    public $stock_max_limit;
    public $description;
    public $image;

    public function createProduct()
    {
        try {
            $this->validate([
                'name' => 'required|unique:products,name|max:255',
                'categoryId' => 'required|exists:categories,id',
                'price' => 'required|min:0',
                'stock' => 'required|min:0',
                'stock_min_limit' => 'required|min:0',
                'stock_max_limit' => 'required|gte:stock_min_limit',
                'description' => 'required',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            ], [
                'name.required' => 'Product name is required.',
                'name.unique' => 'Product name already existed.',
                'name.max' => 'Product name must not exceed 255 characters.',
                'categoryId.required' => 'Please select a category.',
                'categoryId.exists' => 'The selected category does not exist.',
                'price.required' => 'Product price is required.',
                'price.min' => 'Product price must be zero or greater.',
                'stock.required' => 'Current stock is required.',
                'stock.min' => 'Stock must be at least 0.',
                'stock_min_limit.required' => 'Minimum stock is required.',
                'stock_min_limit.min' => 'Minimum stock must be at least 0.',
                'stock_max_limit.required' => 'Maximum stock is required.',
                'stock_max_limit.gte' => 'Maximum stock must be greater than or equal to minimum stock.',
                'description.required' => 'Product description is required.',
                'image.image' => 'Uploaded file must be an image.',
                'image.mimes' => 'Image must be a JPG, JPEG, or PNG file.',
                'image.max' => 'Image size must not exceed 5MB.',
            ]);
        } catch (ValidationException $e) {
            $message = $e->validator->errors()->first();
            notyf()->error($message);
            return;
        }

        $data = [
            'name' => $this->name,
            'category_id' => $this->categoryId,
            'price' => $this->price,
            'description' => $this->description,
        ];

        if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();
            $filename = $this->name . '.' . $extension;
            $path = $this->image->storeAs('products', $filename, 'public');
            $data['image_url'] = $path;
        }

        $product = Product::create($data);

        Inventory::create([
            'product_id' => $product->id,
            'stock' => $this->stock,
            'stock_min_limit' => $this->stock_min_limit,
            'stock_max_limit' => $this->stock_max_limit,
        ]);

        notyf()->success('Product created successfully');
        return redirect()->route('landing.page');
    }

    public function render(CategoryService $categoryService)
    {
        return view('livewire.product-form', [
            'categories' => $categoryService->getAllCategory(),
        ]);
    }
}
