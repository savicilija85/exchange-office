<?php

namespace App\Services\API;

use App\Services\CurrencyLayerServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;

class CurrencyLayerService implements CurrencyLayerServiceInterface
{

    public function getCurrentExchangeRates(array $query) : array
    {
        return Http::withHeaders([
            'Content-Type' => 'text-plain',
            'apikey' => env('CURRENCY_LAYER_ACCESS_KEY')
        ])
            ->get(env('CURRENCY_LAYER_URL') . '/currency_data/live', $query)
            ->json();
    }

    public function prepareExchangeRates(string $source, array $quotes) : array
    {
        $exchangeRates = [];
        foreach ($quotes as $key => $value){
            $exchangeRates[Str::remove($source, $key)] = $value;
        }

        return $exchangeRates;
    }

}
