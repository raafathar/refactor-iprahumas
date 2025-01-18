<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\LetterClassificationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLetterClassificationRequest;
use App\Http\Requests\UpdateLetterClassificationRequest;
use App\Http\Resources\DefaultResource;
use App\Models\LetterClassification;
use Illuminate\Http\Request;
use Throwable;

class LetterClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LetterClassificationDataTable $dataTable)
    {
        return $dataTable->render('dashboard.datamaster.letterclassification.index');
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
    public function store(StoreLetterClassificationRequest $request)
    {
        try {
            $letterclassification = LetterClassification::create($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $letterclassification);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.letterclassification.index');
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
    public function update(UpdateLetterClassificationRequest $request, LetterClassification $LetterClassification)
    {
        try {
            $LetterClassification->update($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $LetterClassification);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('dashboard.datamaster.letterclassification.index');
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
    public function destroy(Request $request, LetterClassification $LetterClassification)
    {
        try {
            $LetterClassification->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('dashboard.datamaster.letterclassification.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}