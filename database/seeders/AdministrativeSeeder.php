<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AdministrativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Seed provinces
            // GET FILE FROM PUBLIC DATA
            $provinces = json_decode(file_get_contents(public_path('data/provinces.json')), true);
            foreach ($provinces as $provinceData) {
                Province::create([
                    'id' => $provinceData['id'],
                    'name' => $provinceData['name'],
                ]);
            }

            // Seed districts
            $districts =
                json_decode(file_get_contents(public_path('data/districts.json')), true);
            foreach ($districts as $districtData) {
                District::create([
                    'id' => $districtData['id'],
                    'name' => $districtData['name'],
                    'province_id' => $districtData['provinsi_id'],
                ]);
            }

            // Seed subdistricts
            $subdistricts =
                json_decode(file_get_contents(public_path('data/subdistricts.json')), true);
            foreach ($subdistricts as $subdistrictData) {
                Subdistrict::create([
                    'id' => $subdistrictData['id'],
                    'name' => $subdistrictData['name'],
                    'district_id' => $subdistrictData['kabupaten_id'],
                ]);
            }

            // Seed villages
            $villages =
                json_decode(file_get_contents(public_path('data/villages.json')), true);
            foreach ($villages as $villageData) {
                Village::create([
                    'id' => $villageData['id'],
                    'name' => $villageData['name'],
                    'subdistrict_id' => $villageData['kecamatan_id'],
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}