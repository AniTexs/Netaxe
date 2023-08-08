<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // run PermissionSeeder
        $this->call(PermissionSeeder::class);
        // run CurrencySeeder
        $this->call(CurrencySeeder::class);
        // run CountrySeeder
        $this->call(CountrySeeder::class);
        // run RoleSeeder
        $this->call(RoleSeeder::class);
    }
}
