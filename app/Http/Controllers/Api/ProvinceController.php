<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Models\Province;
use Illuminate\Http\Request;
use Throwable;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');

            if ($search) {
                $provinces = Province::where('name', 'like', '%' . $search . '%')->paginate(10);
            } else {
                $provinces = Province::paginate(10);
            }

            if ($request->expectsJson()) {
                if ($provinces->isEmpty()) {
                    return new DefaultResource(false, "Data Provinsi Tidak Ditemukan untuk $search", []);
                }

                return new DefaultResource(true, "List Data Provinsi", $provinces);
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