<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $position = [
            ['name' => 'Pranata Humas Ahli Utama', 'sort_order' => 1],
            ['name' => 'Pranata Humas Ahli Madya', 'sort_order' => 2],
            ['name' => 'Pranata Humas Ahli Muda', 'sort_order' => 3],
            ['name' => 'Pranata Humas Ahli Pertama', 'sort_order' => 4],
            ['name' => 'Pranata Humas Penyelia', 'sort_order' => 5],
            ['name' => 'Pranata Humas Mahir', 'sort_order' => 6],
            ['name' => 'Pranata Humas Terampil', 'sort_order' => 7],
            ['name' => 'Calon Pranata Humas', 'sort_order' => 8],
        ];

        try {
            foreach ($position as $positionData) {
                Position::create($positionData);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}