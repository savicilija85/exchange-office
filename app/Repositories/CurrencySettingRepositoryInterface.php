<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface CurrencySettingRepositoryInterface
{
    public function getOne(string $code) : Model;
}
