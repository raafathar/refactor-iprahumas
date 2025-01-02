<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdministrativeResource;
use App\Http\Resources\DefaultResource;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Throwable;

class SubdistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $filter = $request->input('filter');

            if ($search && $filter) {
                $subdistricts = Subdistrict::where('name', 'like', '%' . $search . '%')->where('district_id', $filter)->paginate(10);
            } else {
                $subdistricts = Subdistrict::paginate(10);
            }

            if ($request->expectsJson()) {
                if ($subdistricts->isEmpty()) {
                    return new DefaultResource(false, "Data Kecamatan Tidak Ditemukan untuk $search", []);
                }

                return new DefaultResource(true, "List Data Kecamatan", $subdistricts);
            }

            abort(500);
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
