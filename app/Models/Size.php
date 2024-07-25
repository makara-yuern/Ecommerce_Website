<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'size_id');
    }

    public function productVariants(): HasMany
    {
        return $this->hasMany(ProductVariant::class, 'size_id');
    }
}
