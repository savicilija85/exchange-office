<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public bool $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public function currency_setting(){
        return $this->hasOne(CurrencySetting::class, 'code', 'code');
    }

    public function exchange_rate(){
        return $this->hasOne(ExchangeRate::class, 'code', 'code');
    }
}
