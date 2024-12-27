<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Helper\FileHandler;
use Illuminate\Http\Request;
use InvalidArgumentExceptions;
use App\DataTables\BannerDataTable;
use App\Http\Requests\BannerRequest;

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
                return back()->withInput(["b_image", "Ratio harus 16x9"]);
            }

            $validation["b_image"] = $this->fileImageHandler($request, "b_image", "banner");

            Banner::create($validation);
        } catch (\InvalidArgumentExceptions $th) {
            return back()->with("error", "Ups ada yang salah !");
        }

        return back()->with("success", "berhasil menambahkan");
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
                    return back()->with("error", "Ratio harus 16x9");
                }
                $validation["b_image"] = $this->fileImageUpdateHandler($request, "b_image", $banner->b_image, "banner");
            }
            $banner->update($validation);
        } catch (\Exception $th) {
            return back()->with("error", "Ups ada yang salah !");
        }

        return back()->with("success", "berhasil mengubah banner " . $banner->b_title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            $banner->delete();
            $this->isExistFile($banner->b_image);
        } catch (\InvalidArgumentException $th) {
            return back()->with("error", "Ups ada yang salah !");
        }
        return back()->with("success", "Berhasil menghapus " . $banner->b_title);
    }
}
