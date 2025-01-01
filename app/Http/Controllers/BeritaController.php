<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Berita;
use App\Helper\FileHandler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\BeritaDataTable;
use App\Http\Requests\BeritaRequest;
use Illuminate\Filesystem\Filesystem;
use App\Http\Resources\DefaultResource;

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
        $validation = $request->all();

        $validation["id"] = Str::uuid()->toString();
        $validation["user_id"] = auth()->user()->id;
        $validation["b_is_active"] = isset($validation["b_is_active"]) ? 1 : 0;
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
            $validation["b_is_active"] = isset($validation["b_is_active"]) ? 1 : 0;
            if ($request->hasFile("b_image")) {
                $validation["b_image"] = $this->fileImageUpdateHandler($request, "b_image", $berita->b_image, "berita");
            }
            $validation["b_slug"] = Str::slug($validation["b_title"]);

            Berita::whereId($id)->update($validation);
        } catch (\InvalidArgumentException $th) {
            return back()->with("error", "Ups ada yang salah!");
        }
        return back()->with("success", "Berhasil mengubah berita " . $berita->b_title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $berita = Berita::whereId($id);
            $beritaOld = $berita->first();
            $this->isExistFile($beritaOld->b_image);
            $berita->delete();


            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus ' . $beritaOld->b_title);

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (Throwable $e) {

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}
