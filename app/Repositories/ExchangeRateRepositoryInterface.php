<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface ExchangeRateRepositoryInterface
{
    public function getOneExchangeRate(string $code) : Model;
    public function updateExchangeRate(string $code, float $rate): Model;
}
