<?php

namespace App\Http\Controllers;

use App\DataTables\TrainingDataTable;
use App\Helper\FileHandler;
use App\Http\Requests\TrainingRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    use FileHandler;
    /**
     * Display a listing of the resource.
     */
    public function index(TrainingDataTable $dataTable)
    {
        return $dataTable->render("dashboard.datamaster.pelatihan.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.datamaster.pelatihan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingRequest $request)
    {
        $validation = $request->validated();

        try {
            $validation["p_image"] = $this->fileImageHandler($request, "p_image", "pelatihan");
            $validation["p_is_public"] = isset($validation["p_is_public"]) ? 1 : 0;
            $validation["p_status"] = "active";

            Training::create($validation);

            if ($request->expectsJson()) {
                return new DefaultResource(true, "data berhasil ditambahkan", []);
            }

            return back()->with("success", "Data berhasil ditambahkan");
        } catch (\Throwable $e) {
            return back()->with("error", "Ups ada yang salah!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $training = Training::whereId($id)->first();
        return view("dashboard.datamaster.pelatihan.edit", compact("training"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingRequest $request, $id)
    {
        $validation = $request->validated();

        try {
            if ($request->has("p_image")) {
                $validation["p_image"] = $this->fileImageUpdateHandler($request, "p_image", $training->p_image, "pelatihan");
            }
            $validation["p_is_public"] = isset($validation["p_is_public"]) ? 1 : 0;
            Training::whereId($id)->update($validation);

            return back()->with("success", "Data berhasil diubah");
        } catch (\Throwable $e) {
            return back()->with("error", "Ups ada yang salah!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $training = Training::whereId($id);
        $trainingOld = $training->first();

        try {
            $training->delete();

            $this->isExistFile($trainingOld->p_image);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');
        } catch (\Throwable $e) {

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}
