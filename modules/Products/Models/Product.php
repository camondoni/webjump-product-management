<?php

namespace Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Models\Category;

class Product extends Model
{
    protected $fillable = [
        'name',
        'unit_price',
        'sku',
        'quantity',
        'description'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'id');
    }
}
