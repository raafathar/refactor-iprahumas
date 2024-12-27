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

            $users = User::where('role', 'user')
                ->where('name', '!=', 'User')
                ->take(6)
                ->get();

            $status = ['pending', 'pending', 'approved', 'approved', 'rejected', 'rejected'];

            foreach ($users as $key => $user) {
                Form::create([
                    'user_id' => $user->id,
                    'nip' => fake()->numerify('####################'),
                    'dob' => fake()->date('Y-m-d', '2003-12-31'),
                    'religion' => fake()->randomElement(["islam", "christian", "catholic", "hindu", "buddha", "konghucu", "other"]),
                    'phone' => '08' . fake()->numerify('#########'),
                    'last_education' => fake()->randomElement(['sma', 'd3', 'd4/s1', 's2', 's3']),
                    'last_education_major' => fake()->word(),
                    'last_education_institution' => fake()->company(),
                    'work_unit' => fake()->company(),
                    'position_id' => Position::inRandomOrder()->first()->id,
                    'instance_id' => Instance::inRandomOrder()->first()->id,
                    'golongan_id' => Golongan::inRandomOrder()->first()->id,
                    'skill_id' => Skill::inRandomOrder()->first()->id,
                    'province_id' => $province->id,
                    'district_id' => $district->id,
                    'subdistrict_id' => $subdistrict->id,
                    'village_id' => $village->id,
                    'address' => fake()->address(),
                    'period_id' => period::where('status', 'active')->first()->id,
                    'status' => $status[$key],
                    'reason' => $status[$key] === 'rejected' ? fake()->sentence() : null,
                    'updated_by' => User::where('role', 'admin')->first()->id,
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
