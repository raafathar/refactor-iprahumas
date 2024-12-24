<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $golongan = [
            ['name' => 'II/A - Pengatur Muda', 'sort_order' => 1],
            ['name' => 'II/B - Pengatur Muda Tingkat I', 'sort_order' => 2],
            ['name' => 'II/C - Pengatur', 'sort_order' => 3],
            ['name' => 'II/D - Pengatur Tingkat I', 'sort_order' => 4],
            ['name' => 'III/A - Penata Muda', 'sort_order' => 5],
            ['name' => 'III/B - Penata Muda Tingkat I', 'sort_order' => 6],
            ['name' => 'III/C - Penata', 'sort_order' => 7],
            ['name' => 'III/D - Penata Tingkat I', 'sort_order' => 8],
            ['name' => 'IV/A - Pembina', 'sort_order' => 9],
            ['name' => 'IV/B - Pembina Tingkat I', 'sort_order' => 10],
            ['name' => 'IV/C - Pembina Utama Muda', 'sort_order' => 11],
            ['name' => 'IV/D - Pembina Utama Madya', 'sort_order' => 12],
            ['name' => 'IV/E - Pembina Utama', 'sort_order' => 13],
        ];

        try {
            foreach ($golongan as $golonganData) {
                Golongan::create($golonganData);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}