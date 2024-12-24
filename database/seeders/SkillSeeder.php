<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skill = ["Riset Public Relation", "Monitoring Media", "Ajang Khusus Kehumasan", "Protokoler", "Moderator", "Konfersi Pers", "Penanganan Krisis", "MC", "Materi Ringkasan", "Manajemen Isu dan Opini Publik", "Public Speaking", "Publikasi Institusi", "Juru Bicara", "Lobby dan Negoisasi", "Community Relations", "Opini atau Artikel", "Digital Public Relations", "Goverment Relations", "Desain Grafis", "Video Grafis", "Konten Kreator", "Social Media Spesialis"];

        try {
            foreach ($skill as $skillData) {
                Skill::create(['name' => $skillData]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}