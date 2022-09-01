<?php


namespace App\Repositories\Eloquent;


use App\Models\Currency;
use App\Repositories\CurrencyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CurrencyRepository implements CurrencyRepositoryInterface
{

    public function getNotDefaultCurrencies(): Collection
    {
        return Currency::query()->select(['code'])->where('is_default', '=', false)->get();
    }

    public function getDefaultCurrency(): Model
    {
        return Currency::query()->select(['code'])->where('is_default', '=', true)->first();
    }
}
