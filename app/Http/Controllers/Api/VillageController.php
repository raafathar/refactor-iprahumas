<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Models\Village;
use Illuminate\Http\Request;
use Throwable;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');

            if ($search) {
                $villages = Village::where('name', 'like', '%' . $search . '%')->paginate(10);
            } else {
                $villages = Village::paginate(10);
            }

            if ($request->expectsJson()) {
                if ($villages->isEmpty()) {
                    return new DefaultResource(false, "Data Kelurahan Tidak Ditemukan untuk $search", []);
                }

                return new DefaultResource(true, "List Data Kelurahan", $villages);
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