<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = str_replace(' ', '', $request->input('search'));

            if ($search) {
                $user = User::where('role', 'user')->whereHas('form', function ($query) use ($search) {
                    $query->where('nip', 'like', '%' . $search . '%');
                })->with([
                    'form.province',
                    'form.district',
                    'form.subdistrict',
                    'form.village'
                ])->paginate(10);
            } else {
                $user = User::where('role', 'user')->paginate(10);
            }

            if ($request->expectsJson()) {
                if ($user->isEmpty()) {
                    return new DefaultResource(false, "Data User Tidak Ditemukan untuk NIP $search", []);
                }

                return new DefaultResource(true, "List Data User", $user);
            }

            abort(500);
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500);
        }
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