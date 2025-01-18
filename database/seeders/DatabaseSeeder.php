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
        $this->call([
            UserSeeder::class,
            PositionSeeder::class,
            GolonganSeeder::class,
            InstanceSeeder::class,
            SkillSeeder::class,
            AdministrativeSeeder::class,
            PeriodSeeder::class,
            FormSeeder::class,
            BannerSeeder::class,
            LetterClassificationSeeder::class,
        ]);
        $this->call(BeritasTableSeeder::class);
    }
}