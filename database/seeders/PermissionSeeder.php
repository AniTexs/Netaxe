<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Perms = [
            [
                "name" => "Global Administrator",
                "slug" => "admin-global",
                "description" => "Global administrator to the system, and to administrate all orginasations",
                "scope" => "admin"
            ],
            [
                "name" => "Organisation Administrator",
                "slug" => "app-org-admin",
                "description" => "Organisation administrator to the organisation, and to administrate all users in the organisation",
                "scope" => "app"
            ]
        ];

        foreach ($Perms as $Perm) {
            \App\Models\Permission::create($Perm);
        }
    }
}
