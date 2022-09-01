<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExchangeRate::create([
            [
                'code'  => 'JPY',
                'rate'  => 107.17
            ],
            [
                'code'  => 'GBP',
                'rate'  => 0.711178
            ],
            [
                'code'  => 'EUR',
                'rate'  => 0.884872
            ]
        ]);
    }
}
