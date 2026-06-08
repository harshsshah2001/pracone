<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment_data';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'amount',
        'payment_id',
    ];
}
