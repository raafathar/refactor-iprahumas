<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class BiographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = str_replace(' ', '', $request->input('search'));

            if ($search) {
                $users = User::where('role', 'user')->where('name', 'like', '%' . $search . '%')->whereHas('form', function ($query) {
                    $query->where('status', 'approved');
                })->with([
                    'form.province',
                    'form.district',
                    'form.subdistrict',
                    'form.village'
                ])->paginate(10);
            } else {
                $users = User::where('role', 'user')->whereHas('form', function ($query) {
                    $query->where('status', 'approved');
                })->with([
                    'form.province',
                    'form.district',
                    'form.subdistrict',
                    'form.village'
                ])->paginate(10);
            }

            return view('dashboard.home.biography.index', compact('users'));

        } catch (Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
