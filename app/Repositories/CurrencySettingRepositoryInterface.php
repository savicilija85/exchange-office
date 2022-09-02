<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface CurrencySettingRepositoryInterface
{
    public function getOneCurrencySetting(string $code) : Model;
    public function updateCurrencySetting(string $code, array $data): Model;
}
