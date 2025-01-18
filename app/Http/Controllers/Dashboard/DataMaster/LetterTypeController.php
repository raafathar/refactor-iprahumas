<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\LetterTypeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLetterTypeRequest;
use App\Http\Requests\UpdateLetterTypeRequest;
use App\Http\Resources\DefaultResource;
use App\Models\lettertype;
use Illuminate\Http\Request;
use Throwable;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LetterTypeDataTable $dataTable)
    {
        return $dataTable->render('dashboard.datamaster.lettertype.index');
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
    public function store(StoreLetterTypeRequest $request)
    {
        try {
            $lettertype = LetterType::create($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $lettertype);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.lettertype.index');
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
    public function update(UpdateLetterTypeRequest $request, LetterType $letter_type)
    {
        try {
            $letter_type->update($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $letter_type);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('dashboard.datamaster.lettertype.index');
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
    public function destroy(Request $request, LetterType $letter_type)
    {
        try {
            $letter_type->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('dashboard.datamaster.lettertype.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}