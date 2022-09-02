<?php


namespace App\Repositories\Eloquent;

use App\Models\CurrencySetting;
use App\Repositories\CurrencySettingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CurrencySettingRepository implements CurrencySettingRepositoryInterface
{

    public function getOneCurrencySetting(string $code): Model{
        return CurrencySetting::query()->where('code', '=', $code)->first();
    }

    public function updateCurrencySetting(string $code, array $data): Model
    {
        $currencySetting = CurrencySetting::findOrFail($code);
        $currencySetting->discount = $data['discount'];
        $currencySetting->save();
        return $currencySetting;
    }
}
