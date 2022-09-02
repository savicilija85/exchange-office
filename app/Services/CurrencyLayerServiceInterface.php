<?php

namespace App\Services;

use Illuminate\Http\Client\Response;

interface CurrencyLayerServiceInterface
{
    public function getCurrentExchangeRates(array $query) : array;
    public function prepareExchangeRates(string $source, array $quotes) : array;
}
