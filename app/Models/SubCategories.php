<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
}
