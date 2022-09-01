<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
