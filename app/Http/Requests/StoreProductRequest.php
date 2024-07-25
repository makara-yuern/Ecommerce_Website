<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0.01',
            'stock' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/', // Optional color field (HEX color code)
            'size_id' => 'nullable|integer|exists:sizes,id',
            'discount' => 'nullable|numeric|min:0|max:100',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The product category is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'name.required' => 'The product name is required.',
            'description.required' => 'The product description is required.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.01.',
            'stock.required' => 'The product stock is required.',
            'stock.integer' => 'The stock must be an integer.',
            'stock.min' => 'The stock must be at least 0.',
            'image.image' => 'The image must be a valid image file.',
            'color.regex' => 'The color must be a valid HEX color code.',
            'size_id.exists' => 'The selected size is invalid.',
            'discount.numeric' => 'The discount must be a number.',
            'discount.min' => 'The discount must be at least 0.',
            'discount.max' => 'The discount must be at most 100.',
        ];
    }
}
