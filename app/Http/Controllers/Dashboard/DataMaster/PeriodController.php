<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\PeriodDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Period;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PeriodDataTable $dataTable)
    {
        return $dataTable->render('dashboard.datamaster.period.index');
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
    public function store(StorePeriodRequest $request)
    {
        try {
            $active_period_exists = Period::where('status', 'active')->exists();

            if ($active_period_exists && $request->status === 'active') {
                throw new Exception('Hanya boleh ada satu periode aktif');
            }

            $period = Period::create($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $period);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.period.index');
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
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        try {
            $active_period_exists = Period::where('status', 'active')->exists();

            if ($active_period_exists && $request->status === 'active') {
                throw new Exception('Hanya boleh ada satu periode aktif');
            }

            $period->update($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $period);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('dashboard.datamaster.period.index');
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
    public function destroy(Request $request, Period $period)
    {
        try {
            if ($period->status === 'active') {
                throw new Exception('Periode dengan status aktif tidak dapat dihapus');
            }

            $period->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('dashboard.datamaster.period.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}