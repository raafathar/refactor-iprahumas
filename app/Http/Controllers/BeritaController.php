<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\BeritaDataTable;
use App\Helper\FileHandler;
use App\Http\Requests\BeritaRequest;

class BeritaController extends Controller
{
    use FileHandler;

    /**
     * Display a listing of the resource.
     */
    public function index(BeritaDataTable $dataTable)
    {
        return $dataTable->render("dashboard.datamaster.berita.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.datamaster.berita.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaRequest $request)
    {
        $validation = $request->validated();

        $validation["id"] = Str::uuid()->toString();
        $validation["user_id"] = auth()->user()->id;
        $validation["b_is_active"] = $validation["b_is_active"] == "on" ? 1 : 0;
        $validation["b_image"] = $this->fileImageHandler($request, "b_image", "berita");
        $validation["b_slug"] = Str::slug($validation["b_title"] . "-" . explode("-", $validation["id"])[0]);


        try {
            $berita = Berita::create($validation);
        } catch (\InvalidArgumentException $th) {
            return back()->with("error", "Ups ada yang salah!");
        }

        return back()->with("success", "Berhasil menambahkan " . $berita->b_title);
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
