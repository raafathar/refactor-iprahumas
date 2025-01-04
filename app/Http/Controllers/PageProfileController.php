<?php

namespace App\Http\Controllers;

use Throwable;
use App\Helper\FileHandler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentExceptions;
use App\DataTables\PageProfileDataTable;
use App\Http\Requests\PageProfileRequest;
use App\Http\Resources\DefaultResource;
use App\Models\PageProfile;

class PageProfileController extends Controller
{
    use FileHandler;

    /**
     * Display a listing of the resource.
     */
    public function index(PageProfileDataTable $dataTable)
    {
        return $dataTable->render("dashboard.tampilan.pageprofile.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.tampilan.pageprofile.create");
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(PageProfileRequest $request)
    {
        $validation = $request->all();

        $validation["id"] = Str::uuid()->toString();
        $validation["user_id"] = auth()->user()->id;
        $validation["p_is_active"] = isset($validation["p_is_active"]) ? 1 : 0;
        $validation["p_image"] = $this->fileImageHandler($request, "p_image", "page_profile");
        $validation["p_slug"] = Str::slug($validation["p_title"] . "-" . explode("-", $validation["id"])[0]);


        try {
            $pageProfile = PageProfile::create($validation);
        } catch (\InvalidArgumentException $th) {
            return back()->with("error", "Ups ada yang salah!");
        }

        return back()->with("success", "Berhasil menambahkan Halaman " . $pageProfile->p_title);
    }

    /**
     * Update the specified resource in storage.
     */

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            
            $page = PageProfile::whereId($id);
            $pageOld = $page->first();
            $this->isExistFile($pageOld->p_image);
            $page->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus ' . $pageOld->p_title);

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (Throwable $e) {

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}
