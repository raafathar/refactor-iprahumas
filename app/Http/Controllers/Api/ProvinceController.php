<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdministrativeResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $provinces = Province::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $provinces = Province::paginate(10);
        }

        return new AdministrativeResource(true, "List Data Provinsi", $provinces);
    }

    public function show($id)
    {
        $province = Province::find($id);

        if ($province) {
            return new AdministrativeResource(true, "Detail Data Provinsi", $province);
        }

        return new AdministrativeResource(false, "Data Provinsi Tidak Ditemukan", null);
    }
}