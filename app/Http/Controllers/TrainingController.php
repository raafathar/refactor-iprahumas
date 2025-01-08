<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Training;
use App\Helper\FileHandler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\TrainingDataTable;
use App\Http\Requests\TrainingRequest;
use App\Http\Resources\DefaultResource;

class TrainingController extends Controller
{
    use FileHandler;
    /**
     * Display a listing of the resource.
     */
    public function index(TrainingDataTable $dataTable)
    {
        $training = Training::all(["id", "p_title"]);
        return $dataTable->render("dashboard.datamaster.pelatihan.index", [
            "trainings" => $training
        ]);
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
            $validation["p_slug"] = Str::slug($validation["p_title"]) . "-" . explode("-", Str::uuid())[0];

            Training::create($validation);

            if ($request->expectsJson()) {
                return new DefaultResource(true, "data berhasil ditambahkan", []);
            }

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', []);
            }

            toastr()->success('Data berhasil ditambahkan');
        } catch (\Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, "Ups ada yang salah! Silakan hubungi tim pengembang!", []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $training = Training::whereId($id)->first();
        // $zona = Carbon::parse($training->p_start_date)->format("T");
        // return view("dashboard.datamaster.pelatihan.detail", compact("training", "zona"));
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
        $training = Training::whereId($id)->first();
        $validation = $request->validated();

        try {
            if ($training->p_title != $validation["p_title"]) {
                $validation["p_slug"] = Str::slug($validation["p_title"]) . "-" . explode("-", $training->p_slug)[count(explode("-", $training->p_slug)) - 1];
            }

            if ($request->has("p_image")) {
                $validation["p_image"] = $this->fileImageUpdateHandler($request, "p_image", $training->p_image, "pelatihan");
            }

            $validation["p_is_public"] = isset($validation["p_is_public"]) ? 1 : 0;
            // dd($validation, Training::whereId($id)->first());
            Training::whereId($id)->update($validation);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diubah', []);
            }

            toastr()->success('Data berhasil ditambahkan');
        } catch (\Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, "Ups ada yang salah! Silakan hubungi tim pengembang!", []);
            }

            abort(500, $e->getMessage());
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
