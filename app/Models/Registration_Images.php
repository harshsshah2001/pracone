<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration_Images extends Model
{
    protected $table = 'registration__images';

    protected $fillable = [
        'register_id',
        'image',
    ];

    public function register(){
        return $this->belongsTo(Register::class, 'register_id');
    }
}
