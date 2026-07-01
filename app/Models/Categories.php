<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'created_at',   
        'updated_at'
    ];

    public function SubCategories(){
        return $this->hasMany(SubCategories::class,'category_id');
    }
}
