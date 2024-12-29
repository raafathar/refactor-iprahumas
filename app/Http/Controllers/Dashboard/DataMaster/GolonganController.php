<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\GolonganDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGolonganRequest;
use App\Http\Requests\UpdateGolonganRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Throwable;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GolonganDataTable $dataTable)
    {
        return $dataTable->render('dashboard.datamaster.golongan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGolonganRequest $request)
    {
        try {
            $golongan = Golongan::create($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $golongan);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.golongan.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGolonganRequest $request, Golongan $golongan)
    {
        try {
            $golongan->update($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $golongan);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('dashboard.datamaster.golongan.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Golongan $golongan)
    {
        try {
            $golongan->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('dashboard.datamaster.golongan.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}