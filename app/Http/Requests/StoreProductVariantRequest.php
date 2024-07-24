<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductVariantRequest extends FormRequest
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
            'variant_name.*' => 'required|string',
            'variant_size.*' => 'required|string',
            'variant_color.*' => 'nullable|string',
            'variant_price.*' => 'nullable|numeric',
            'variant_stock.*' => 'required|integer',
            'variant_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'variant_name.*.required' => 'The variant name is required.',
            'variant_size.*.required' => 'The variant size is required.',
            'variant_color.*.required' => 'The variant color is required.',
            'variant_price.*.required' => 'The variant price is required.',
            'variant_stock.*.required' => 'The variant stock is required.',
            'variant_image.*.required' => 'The variant image is required.',
        ];
    }
}
