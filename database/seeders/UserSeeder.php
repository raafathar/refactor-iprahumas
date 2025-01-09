<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Seed superadmin
            User::create([
                'name' => 'Superadmin',
                'email' => 'superadmin@iprahumas.id',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'role' => 'superadmin',
            ]);

            // Seed admin
            User::create([
                'name' => 'Admin',
                'email' => 'admin@iprahumas.id',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ]);

            // Seed user
//            User::create([
//                'name' => 'User',
//                'email' => 'user@iprahumas.id',
//                'password' => bcrypt('password'),
//                'email_verified_at' => now(),
//                'role' => 'user',
//            ]);
//
//            // Seed 6 additional users with Faker
//            for ($i = 0; $i < 6; $i++) {
//                User::create([
//                    'name' => fake()->name(),
//                    'email' =>
//                    fake()->unique()->safeEmail(),
//                    'password' => bcrypt('password'),
//                    'email_verified_at' => now(),
//                    'role' => 'user',
//                ]);
//            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
