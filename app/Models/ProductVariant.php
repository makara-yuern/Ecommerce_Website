<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 
        'variant_name', 
        'size_id', 
        'variant_color', 
        'price', 
        'stock', 
        'image',
    ];

    /**
     * Get the product that owns the variant.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the size associated with the variant.
     */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
