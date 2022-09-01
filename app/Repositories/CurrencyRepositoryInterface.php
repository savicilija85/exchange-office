<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CurrencyRepositoryInterface
{
    public function getNotDefaultCurrencies() : Collection;
    public function getDefaultCurrency() : Model;

}
