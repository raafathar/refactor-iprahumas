<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdministrativeResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $districts = District::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $districts = District::paginate(10);
        }

        return new AdministrativeResource(true, "List Data Kabupaten", $districts);
    }

    public function show($id)
    {
        $district = District::find($id);

        if ($district) {
            return new AdministrativeResource(true, "Detail Data Kabupaten", $district);
        }

        return new AdministrativeResource(false, "Data Kabupaten Tidak Ditemukan", null);
    }

    public function getByProvince($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->get();

        if ($districts->count() > 0) {
            return new AdministrativeResource(true, "List Data Kabupaten Berdasarkan Province ID $provinceId", $districts);
        }

        return new AdministrativeResource(false, "Data Kabupaten Tidak Ditemukan untuk Province ID $provinceId", null);
    }
}