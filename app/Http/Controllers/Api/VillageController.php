<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdministrativeResource;
use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $villages = Village::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $villages = Village::paginate(10);
        }

        return new AdministrativeResource(true, 'List Data Kelurahan', $villages);
    }

    public function show($id)
    {
        $village = Village::find($id);

        if ($village) {
            return new AdministrativeResource(true, 'Detail Data Kelurahan', $village);
        }

        return new AdministrativeResource(false, 'Data Kelurahan Tidak Ditemukan', null);
    }

    public function getBySubdistrict($subdistrict_id)
    {
        $villages = Village::where('subdistrict_id', $subdistrict_id)->get();

        if ($villages->count() > 0) {
            return new AdministrativeResource(true, "List Data Kelurahan Berdasarkan Kecamatan ID $subdistrict_id", $villages);
        }

        return new AdministrativeResource(false, "Data Kelurahan Tidak Ditemukan untuk Kecamatan ID $subdistrict_id", null);
    }
}
