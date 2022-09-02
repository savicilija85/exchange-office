<?php


namespace App\Repositories\Eloquent;

use App\Models\CurrencySetting;
use App\Repositories\CurrencySettingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CurrencySettingRepository implements CurrencySettingRepositoryInterface
{

    public function getCurrencySettingByID(string $code): Model{
        return CurrencySetting::query()->where('code', '=', $code)->first();
    }
}
