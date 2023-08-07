<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * Seeded Roles:
            - Global Administrator
            - Administrator
            - Assistant
            - Employee
            - Read Only
         */
        $roles = [
            [
                "name" => "Global Administrator",
                "description" => "Global Administrator",
                "slug" => "global-administrator",
            ],
            [
                "name" => "Administrator",
                "description" => "Administrator",
                "slug" => "administrator",
            ],
            [
                "name" => "Assistant",
                "description" => "Assistant",
                "slug" => "assistant",
            ],
            [
                "name" => "Employee",
                "description" => "Employee",
                "slug" => "employee",
            ],
            [
                "name" => "Read Only",
                "description" => "Read Only",
                "slug" => "read-only",
            ],

        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
