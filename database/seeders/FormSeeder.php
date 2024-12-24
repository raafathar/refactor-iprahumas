<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Form;
use App\Models\Golongan;
use App\Models\Instance;
use App\Models\period;
use App\Models\Position;
use App\Models\Province;
use App\Models\Skill;
use App\Models\Subdistrict;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Seed form
            $province = Province::where('name', 'Jawa Timur')->first();
            $district = District::where('province_id', $province->id)->first();
            $subdistrict = Subdistrict::where('district_id', $district->id)->first();
            $village = Village::where('subdistrict_id', $subdistrict->id)->first();

            $forms = [
                [
                    'user_id' => User::where('role', 'user')->first()->id,
                    'nip' => '12345678901234567890',
                    'dob' => '2001-01-01',
                    'religion' => 'islam',
                    'phone' => '081234567890',
                    'last_education' => 'd4/s1',
                    'last_education_major' => 'Teknik Informatika',
                    'last_education_institution' => 'Universitas Trunojoyo Madura',
                    'work_unit' => 'Dinas Komunikasi dan Informatika',
                    'position_id' => Position::first()->id,
                    'instance_id' => Instance::first()->id,
                    'golongan_id' => Golongan::first()->id,
                    'skill_id' => Skill::first()->id,
                    'province_id' => $province->id,
                    'district_id' => $district->id,
                    'subdistrict_id' => $subdistrict->id,
                    'village_id' => $village->id,
                    'address' => 'Jl. Raya No. 1',
                    'period_id' => period::where('status', 'active')->first()->id,
                    'status' => 'pending',
                    'updated_by' => User::where('role', 'admin')->first()->id,
                ],
            ];

            foreach ($forms as $formData) {
                Form::create($formData);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}