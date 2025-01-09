<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\UsersDataTable;
use App\Helper\FileHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Form;
use App\Models\Golongan;
use App\Models\Instance;
use App\Models\Period;
use App\Models\Position;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\AccountDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class UserController extends Controller
{
    use FileHandler;
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        $positions = Position::all();
        $instances = Instance::all();
        $golongans = Golongan::all();
        $skills = Skill::all();
        $periods = Period::all();

        return $dataTable->render('dashboard.datamaster.user.index', compact('positions', 'instances', 'golongans', 'skills', 'periods'));
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
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {
            $active_period = Period::where('status', 'active')->first();

            if (!$active_period) {
                throw new Exception('Periode pendaftaran telah berakhir');
            }

            $path_profile_picture = $request->file('profile_picture')->store('images/profile_pictures');
            $password_rand = Str::random(8);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'profile_picture' => $path_profile_picture,
                'password' => bcrypt($password_rand),
                'role' => 'user',
            ]);

            $form = Form::create([
                'user_id' => $user->id,
                'nip' => $request->nip,
                'dob' => $request->dob,
                'new_member_number' => generate_new_member_number(),
                'religion' => $request->religion,
                'phone' => $request->phone,
                'last_education' => $request->last_education,
                'last_education_major' => $request->last_education_major,
                'last_education_institution' => $request->last_education_institution,
                'work_unit' => $request->work_unit,
                'position_id' => $request->position_id,
                'instance_id' => $request->instance_id,
                'golongan_id' => $request->golongan_id,
                'province_id' => $request->province_id,
                'district_id' => $request->district_id,
                'subdistrict_id' => $request->subdistrict_id,
                'village_id' => $request->village_id,
                'address' => $request->address,
                'status' => 'pending',
                'updated_by' => Auth::user()->id,
            ]);

            $skills = $request->input('skill_id', []);
            $form->skills()->sync($skills);
            $form->periods()->attach($active_period->id, [
                'id' => Str::uuid()
            ]);

            DB::commit();

            $user->notify(new AccountDetail($request, $password_rand));

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $user);
            }

            toastr()->success('Registrasi berhasil, silakan cek email Anggota untuk melihat detail akun.');

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (Throwable $e) {
            DB::rollBack();

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
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();

        try {
            if ($request->hasFile('profile_picture')) {
                $path_profile_picture = $this->fileImageUpdateHandler($request, "profile_picture", $user->profile_picture, "images/profile_pictures");
            } else {
                $path_profile_picture = $user->profile_picture;
            }

            $user->update([
                'name' => $request->name,
                'profile_picture' => $path_profile_picture,
            ]);

            $form = Form::where('user_id', $user->id)->first();
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

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $user);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->route('dashboard.datamaster.user.index');
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
    public function destroy(Request $request, User $user)
    {
        DB::beginTransaction();

        try {
            $form = Form::where('user_id', $user->id)->first();
            $form->delete();
            $user->delete();

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}
