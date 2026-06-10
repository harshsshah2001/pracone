<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Register extends Authenticatable
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
