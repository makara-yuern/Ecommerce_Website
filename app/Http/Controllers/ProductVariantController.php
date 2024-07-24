<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductVariantRequest;
use App\Http\Requests\UpdateProductVariantRequest;
use App\Models\ProductVariant;

class ProductVariantController extends Controller
{
    public function index()
    {
        $variants = ProductVariant::all();
        return view('product_variants.index', compact('variants'));
    }

    public function create()
    {
        return view('product_variants.create');
    }

    public function store(StoreProductVariantRequest $request)
{
    $validated = $request->validated();

    foreach ($validated['variant_name'] as $index => $variantName) {
        $imagePath = null;
        if ($request->hasFile('variant_image.' . $index)) {
            $image = $request->file('variant_image.' . $index);
            $imagePath = $image->store('public/variant_images');
        }

        ProductVariant::create([
            'product_id' => $request->product_id,
            'variant_name' => $variantName,
            'variant_size' => $validated['variant_size'][$index],
            'variant_color' => $validated['variant_color'][$index] ?? null,
            'price' => $validated['variant_price'][$index] ?? null,
            'image' => $imagePath,
            'stock' => $validated['variant_stock'][$index],
        ]);
    }

    return redirect()->route('products.index')->with('success', 'Product variants created successfully.');
}

    public function show(ProductVariant $variant)
    {
        return view('product_variants.show', compact('variant'));
    }

    public function edit(ProductVariant $variant)
    {
        return view('product_variants.edit', compact('variant'));
    }

    public function update(UpdateProductVariantRequest $request, ProductVariant $variant)
    {
        $variant->update($request->validated());
        return redirect()->route('product_variants.index');
    }

    public function destroy(ProductVariant $variant)
    {
        $variant->delete();
        return redirect()->route('product_variants.index');
    }
}
