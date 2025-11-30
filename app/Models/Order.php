<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'address',
        'product',
        'quantity',
        'notes',
        'payment_method',
        'delivery_method'
    ];
}