<?php


namespace App\Repositories\Eloquent;

use App\Models\ExchangeRate;
use App\Repositories\ExchangeRateRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ExchangeRateRepository implements ExchangeRateRepositoryInterface
{

    public function getOneExchangeRate(string $code) : Model{
        return ExchangeRate::query()->where('code', '=', $code)->first();
    }

    public function updateExchangeRate(string $code, float $rate): Model
    {
        $exchangeRate = ExchangeRate::query()->where('code', '=', $code)->first();
        $exchangeRate->rate = $rate;
        $exchangeRate->save();

        return $exchangeRate;
    }
}
