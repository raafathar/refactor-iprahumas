<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\SkillDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Skill;
use Illuminate\Http\Request;
use Throwable;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SkillDataTable $dataTable)
    {
        return $dataTable->render('dashboard.datamaster.skill.index');
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
    public function store(StoreSkillRequest $request)
    {
        try {
            $skill = Skill::create($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $skill);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.skill.index');
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
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        try {
            $skill->update($request->all());

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $skill);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('dashboard.datamaster.skill.index');
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
    public function destroy(Request $request, Skill $skill)
    {
        try {
            $skill->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('dashboard.datamaster.skill.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}