<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'admin';

    protected $fillable = [
        'email',
        'password',
        'forgot_password',
    ];

    protected $hidden = [
        'password',
    ];
}
