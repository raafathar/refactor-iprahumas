<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\InstanceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstanceRequest;
use App\Http\Requests\UpdateInstanceRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Instance;
use Illuminate\Http\Request;
use Throwable;

class InstanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(InstanceDataTable $dataTable)
    {
        return $dataTable->render('dashboard.datamaster.instance.index');
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
    public function store(StoreInstanceRequest $request)
    {
        try {
            $instance = Instance::create($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $instance);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.instance.index');
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
    public function update(UpdateInstanceRequest $request, Instance $instance)
    {
        try {
            $instance->update($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $instance);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('dashboard.datamaster.instance.index');
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
    public function destroy(Request $request, Instance $instance)
    {
        try {
            $instance->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('dashboard.datamaster.instance.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}