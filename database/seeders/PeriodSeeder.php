<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            Period::create([
                'name' => 'Periode 2024-2024',
                'start_date' => '2024-01-02',
                'end_date' => '2024-12-31',
                'status' => 'active',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
