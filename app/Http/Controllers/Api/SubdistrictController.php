<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdministrativeResource;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class SubdistrictController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $subdistricts = Subdistrict::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $subdistricts = Subdistrict::paginate(10);
        }

        return new AdministrativeResource(true, "List Data Kecamatan", $subdistricts);
    }

    public function show($id)
    {
        $subdistrict = Subdistrict::find($id);

        if ($subdistrict) {
            return new AdministrativeResource(true, "Detail Data Kecamatan", $subdistrict);
        }

        return new AdministrativeResource(false, "Data Kecamatan Tidak Ditemukan", null);
    }

    public function getByDistrict($district_id)
    {
        $subdistricts = Subdistrict::where('district_id', $district_id)->get();

        if ($subdistricts->count() > 0) {
            return new AdministrativeResource(true, "List Data Kecamatan Berdasarkan Kabupaten ID $district_id", $subdistricts);
        }

        return new AdministrativeResource(false, "Data Kecamatan Tidak Ditemukan untuk Kabupaten ID $district_id", null);
    }
}