<?php

namespace Database\Seeders;

use App\Models\LetterClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letterclass = [
            ['name' => 'SK Anggota', 'kode' => 4001],
            ['name' => 'Permohoan Narasumber', 'kode' => 4002],
        ];

        try {
            foreach ($letterclass as $letterdata) {
                LetterClassification::create($letterdata);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}