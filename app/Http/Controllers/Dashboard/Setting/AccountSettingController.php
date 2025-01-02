<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountSettingRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Form;
use App\Models\Golongan;
use App\Models\Instance;
use App\Models\Position;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class AccountSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::all();
        $instances = Instance::all();
        $golongans = Golongan::all();
        $skills = Skill::all();

        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin') {
            $user = User::where('id', Auth::user()->id)->first();
        } else {
            $user = User::where('id', Auth::user()->id)->whereHas('form')->with([
                'form.province',
                'form.district',
                'form.subdistrict',
                'form.village',
            ])->first();
        }

        return view('dashboard.setting.account.index', compact('positions', 'instances', 'golongans', 'skills', 'user'));
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
    public function update(UpdateAccountSettingRequest $request, User $account_setting)
    {
        DB::beginTransaction();

        try {
            if ($request->hasFile('profile_picture')) {
                $path_profile_picture = $request->file('profile_picture')->store('images/profile_pictures');
            } else {
                $path_profile_picture = $account_setting->profile_picture;
            }

            if ($request->filled('password')) {
                $account_setting->update([
                    'name' => $request->name,
                    'profile_picture' => $path_profile_picture,
                    'password' => bcrypt($request->password),
                    'email' => $request->email,
                ]);
            } else {
                $account_setting->update([
                    'name' => $request->name,
                    'profile_picture' => $path_profile_picture,
                    'email' => $request->email,
                ]);
            }

            if ($account_setting->role === 'user') {
                $form = Form::where('user_id', $account_setting->id)->first();
                $form->update([
                    'nip' => $request->nip,
                    'phone' => $request->phone,
                    'dob' => $request->dob,
                    'religion' => $request->religion,
                    'position_id' => $request->position_id,
                    'instance_id' => $request->instance_id,
                    'golongan_id' => $request->golongan_id,
                    'work_unit' => $request->work_unit,
                    'skill_id' => $request->skill_id,
                    'last_education' => $request->last_education,
                    'last_education_major' => $request->last_education_major,
                    'last_education_institution' => $request->last_education_institution,
                    'province_id' => $request->province_id,
                    'district_id' => $request->district_id,
                    'subdistrict_id' => $request->subdistrict_id,
                    'village_id' => $request->village_id,
                    'address' => $request->address,
                    'updated_by' => Auth::user()->id,
                ]);
            }

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui.', []);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('account-setting.index');
        } catch (Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
