<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category_id', 
        'description', 
        'price', 
        'stock', 
        'discount', 
        'size_id', 
        'color', 
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    /**
     * Get the variants for the product.
     */
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
