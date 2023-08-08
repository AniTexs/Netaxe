<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $api = Http::get('https://openexchangerates.org/api/currencies.json')->json();
        $currencies = [];
        //dd($api);
        foreach($api as $key => $value){
            $currencies[] = [
                'currency_code' => $key,
                'currency_name' => $value,
            ];
        }
        foreach ($currencies as $currency) {
            \App\Models\Currency::create($currency);
        }
    }
}
