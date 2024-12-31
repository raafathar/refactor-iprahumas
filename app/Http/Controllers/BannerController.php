<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Helper\FileHandler;
use Illuminate\Http\Request;
use InvalidArgumentExceptions;
use App\DataTables\BannerDataTable;
use App\Http\Requests\BannerRequest;
use App\Http\Resources\DefaultResource;

class BannerController extends Controller
{
    use FileHandler;

    /**
     * Display a listing of the resource.
     */
    public function index(BannerDataTable $dataTable)
    {
        return $dataTable->render("dashboard.tampilan.banner.index");
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
    public function store(BannerRequest $request)
    {
        try {
            $validation = $request->validated();
            $validation["b_is_active"] = isset($validation["b_is_active"]) ? 1 : 0;

            if (!$this->fileImageCheckRatio($request, "b_image", 16, 9)) {
                return response()->json([
                    "message" => "Ratio gambar harus 16x9",
                    "errors" => [
                        "b_image" => ["Gambar harus memiliki ratio 16x9!"]
                    ]
                ], 422);
            }

            $validation["b_image"] = $this->fileImageHandler($request, "b_image", "banner");

            Banner::create($validation);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', []);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (\Throwable $e) {

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        try {
            $validation = $request->all();

            $validation["b_is_active"] = isset($validation["b_is_active"]) ? 1 : 0;
            if ($request->hasFile("b_image")) {
                if (!$this->fileImageCheckRatio($request, "b_image", 16, 9)) {
                    return response()->json([
                        "message" => "Ratio gambar harus 16x9",
                        "errors" => [
                            "b_image" => ["Gambar harus memiliki ratio 16x9!"]
                        ]
                    ], 422);
                }
                $validation["b_image"] = $this->fileImageUpdateHandler($request, "b_image", $banner->b_image, "banner");
            }
            $banner->update($validation);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diubah', []);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (\Throwable $e) {

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Banner $banner)
    {
        try {
            $banner->delete();
            $this->isExistFile($banner->b_image);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus ' . $banner->b_title);

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (\Throwable $e) {

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}
