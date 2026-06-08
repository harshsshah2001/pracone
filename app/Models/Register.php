<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image',
    ];

    public function images()
    {
        return $this->hasMany(Registration_Images::class, 'register_id');
    }
}
