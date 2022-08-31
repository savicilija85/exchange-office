<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Currency;
use App\Models\CurrencySetting;
use App\Models\ExchangeRate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();

        Currency::create([
            [
                'code'          => 'USD',
                'is_default'    => true
            ],
            [
                'code'          => 'JPY',
                'is_default'    => false
            ],
            [
                'code'          => 'GBP',
                'is_default'    => false
            ],
            [
                'code'          => 'EUR',
                'is_default'    => false
            ]
        ]);

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
