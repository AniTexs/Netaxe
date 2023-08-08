<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $API = Http::get('https://restcountries.com/v3.1/all?fields=name,cca2,ccn3,cca3,cioc')->json();
        $countries = [];
        foreach ($API as $country) {
            $countries[] = [
                'cca2' => $country['cca2'],
                'ccn3' => $country['ccn3'],
                'cca3' => $country['cca3'],
                'cioc' => $country['cioc'],
                'name' => $country['name']["common"],
            ];
        }
        foreach ($countries as $country) {
            \App\Models\Country::create($country);
        }
    }
}
