<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\BeritaDataTable;
use App\Helper\FileHandler;
use App\Http\Requests\BeritaRequest;
use Illuminate\Filesystem\Filesystem;

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

        return back()->with("success", "Berhasil menambahkan berita " . $berita->b_title);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

        $berita = Berita::whereBSlug($slug)->first();
        return view("dashboard.datamaster.berita.detail", compact("berita"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        // $file = new Filesystem();
        // $imagePath = public_path("berita");

        // dd($file->files($imagePath)[1]);
        // dd(file_get_contents($imagePath));
        $berita = Berita::whereBSlug($slug)->first();
        return view("dashboard.datamaster.berita.edit", compact("berita"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeritaRequest $request, $id)
    {
        $validation = $request->validated();

        try {
            $berita = Berita::findOrFail($id)->first();
            $validation["b_is_active"] = $validation["b_is_active"] == "on" ? 1 : 0;
            $validation["b_image"] = $this->fileImageUpdateHandler($request, "b_image", $berita->b_image, "berita");
            $validation["b_slug"] = Str::slug($validation["b_title"] . "-" . explode("-", $berita->id)[0]);
            Berita::whereId($id)->update($validation);
        } catch (\InvalidArgumentException $th) {
            return back()->with("error", "Ups ada yang salah!");
        }
        return back()->with("success", "Berhasil mengubah berita " . $berita->b_title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $berita = Berita::whereId($id)->first();
            $beritaOld = $berita->first();
            $berita->delete();

            $this->isExistFile($beritaOld->b_image);
        } catch (\InvalidArgumentException $th) {
            return back()->with("error", "Ups ada yang salah ni");
        }
        return back()->with("success", "Berhasil menghapus berita " . $beritaOld->b_title);
    }
}
