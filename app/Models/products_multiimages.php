<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products_multiimages extends Model
{
    protected $fillable = [
        'product_id',
        'multiimages',
    ];

    public function product()
    {
       return $this->belongsTo(Product::class, 'product_id');
    }
}
