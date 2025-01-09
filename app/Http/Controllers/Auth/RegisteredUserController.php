<?php

namespace App\Http\Controllers\Auth;

use App\Helper\FileHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
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
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class RegisteredUserController extends Controller
{
    use FileHandler;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'positions' => Position::all(),
            'instances' => Instance::all(),
            'golongans' => Golongan::all(),
            'skills' => Skill::all(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {
            // Menangani periode pendaftaran aktif
            $active_period = Period::where('status', 'active')->first();
            if (!$active_period) {
                toastr()->warning('Periode pendaftaran telah berakhir');

                return redirect()->back();
            }

            // Mencari user berdasarkan NIP yang terkait
            $user = User::where('role', 'user')->whereHas('form', function ($query) use ($request) {
                $query->where('nip', 'like', '%' . $request->nip . '%');
            })->first();

            $path_profile_picture = $request->file('profile_picture')
                ? $request->file('profile_picture')->store('images/profile_pictures')
                : null;

            // Mengatur password untuk user baru
            $password_rand = !$user || $user->password == null ? Str::random(8) : null;
            $password = $password_rand ? bcrypt($password_rand) : $user->password;

            // Jika user belum ada, buat user baru
            if (!$user) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'profile_picture' => $path_profile_picture,
                    'password' => $password,
                    'role' => 'user',
                ]);
            } else {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'profile_picture' => $path_profile_picture ?? $user->profile_picture,
                    'email_verified_at' => null,
                    'password' => $password,
                ]);
            }

            $form = Form::updateOrCreate(
                [
                    'nip' => $request->nip,
                    'user_id' => $user->id,
                ],
                [
                    'nip' => $request->nip,
                    'user_id' => $user->id,
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
                    'payment_proof' => null,
                    'reason' => null,
                    'updated_by' => $user->id,
                ]
            );

            $skills = $request->input('skill_id', []);
            $form->skills()->sync($skills);
            $form->periods()->attach($active_period->id, [
                'id' => Str::uuid()
            ]);

            Auth::login($user);

            // Kirim notifikasi ke user
            $password_message = $password_rand === null ? 'Password tidak berubah' : $password_rand;
            $user->notify(new AccountDetail($request, $password_message));

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', $user);
            }

            toastr()->success('Registrasi berhasil, silakan cek email Anda untuk melihat detail akun.');

            return redirect(route('dashboard', absolute: false));
        } catch (Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }
}
