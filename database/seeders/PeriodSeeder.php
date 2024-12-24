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
                'name' => 'Periode 2025-2028',
                'start_date' => '2025-01-01',
                'end_date' => '2028-12-31',
                'status' => 'active',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}