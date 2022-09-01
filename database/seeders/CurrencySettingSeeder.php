<?php

namespace Database\Seeders;

use App\Models\CurrencySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrencySetting::create([
            [
                'code'          => 'JPY',
                'surcharge'     => 7.5,
                'discount'      => 0
            ],
            [
                'code'          => 'GBP',
                'surcharge'     => 5,
                'discount'      => 0
            ],
            [
                'code'          => 'EUR',
                'surcharge'     => 5,
                'discount'      => 2
            ]
        ]);
    }
}
