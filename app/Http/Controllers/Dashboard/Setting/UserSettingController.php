<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\DataTables\UserSettingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserSettingRequest;
use App\Http\Requests\UpdateUserSettingRequest;
use App\Http\Resources\DefaultResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserSettingDataTable $dataTable)
    {
        return $dataTable->render('dashboard.setting.user.index');
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
    public function store(StoreUserSettingRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'email_verified_at' => now(),
                'role' => $request->role,
            ]);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $user);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('user-settings.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
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
    public function update(UpdateUserSettingRequest $request, User $user_setting)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ];

            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user_setting->update($data);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $user_setting);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('user-settings.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user_setting)
    {
        try {
            $user_setting->delete();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('user-settings.index');
        } catch (Throwable $e) {
            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}
