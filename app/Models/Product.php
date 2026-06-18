<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\products_multiimages;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'register_id',
    ];

    public function manyproductimages()
    {
       return $this->hasMany(products_multiimages::class, 'product_id');
    }
}
