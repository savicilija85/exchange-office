<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public bool $timestamps = false;

    protected array $fillable = [
        'code',
        'rate',
        'surcharge_percentage',
        'surcharge_amount',
        'discount_percentage',
        'discount_amount',
        'amount_purchased',
        'amount_paid',
        'created_at'
    ];
}
