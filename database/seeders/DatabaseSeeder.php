<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => Hash::make('super123'),
                'role' => 'Super Admin',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Oprec Admin',
                'email' => 'oprec@admin.com',
                'password' => Hash::make('oprec123'),
                'role' => 'Oprec Admin',
            ]
        ]);
    }
}
