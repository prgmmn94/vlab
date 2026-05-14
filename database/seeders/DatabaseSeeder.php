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
                'password' => Hash::make('maljilbildam'),
                'role' => 'Super Admin',
            ],
            [
                'name' => 'Operation Admin',
                'email' => 'operation@admin.com',
                'password' => Hash::make('progterbaik'),
                'role' => 'Operation Admin',
            ],
            [
                'name' => 'Oprec Admin',
                'email' => 'oprec@admin.com',
                'password' => Hash::make('kapanbultang'),
                'role' => 'Oprec Admin',
            ]
        ]);
    }
}
