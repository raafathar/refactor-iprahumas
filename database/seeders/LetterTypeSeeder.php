<?php

namespace Database\Seeders;

use App\Models\LetterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letterclass = [
            ['name' => 'Surat Perjalanan', 'kode' => 003],
            ['name' => 'Surat Umum', 'kode' => 002],
        ];

        try {
            foreach ($letterclass as $letterdata) {
                LetterType::create($letterdata);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}