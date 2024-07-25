<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function createProduct(array $data)
    {
        $product = new Product();
        $product->name = $data['name'];
        $product->category_id = $data['category_id'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->stock = $data['stock'] ?? 0;
        $product->color = $data['color'] ?? null; 
        $product->size_id = $data['size_id'] ?? null;
        $product->discount = $data['discount'] ?? 0.00;

        if (isset($data['image'])) {
            $avatarPath = $data['image']->store('images/products', 'public');
            $product->image = $avatarPath;
        }

        $product->save();

        return $product;
    }
}
