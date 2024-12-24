<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Form;
use App\Models\Golongan;
use App\Models\Instance;
use App\Models\Period;
use App\Models\Position;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\AccountDetail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
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
    public function store(StoreUserRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
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
                'religion' => $request->religion,
                'phone' => $request->phone,
                'last_education' => $request->last_education,
                'last_education_major' => $request->last_education_major,
                'last_education_institution' => $request->last_education_institution,
                'work_unit' => $request->work_unit,
                'position_id' => $request->position_id,
                'instance_id' => $request->instance_id,
                'golongan_id' => $request->golongan_id,
                'skill_id' => $request->skill_id,
                'province_id' => $request->province_id,
                'district_id' => $request->district_id,
                'subdistrict_id' => $request->subdistrict_id,
                'village_id' => $request->village_id,
                'address' => $request->address,
                'period_id' => Period::where('status', 'active')->first()->id,
                'status' => 'pending',
                'updated_by' => $user->id,
            ]);

            event(new Registered($user));

            Auth::login($user);

            DB::commit();

            $user = Auth::user();
            $user->notify(new AccountDetail($request, $password_rand));

            toastr()->success('Registrasi berhasil, silakan periksa email Anda untuk verifikasi.');

            return redirect(route('dashboard', absolute: false));
        } catch (QueryException $e) {
            DB::rollBack();

            toastr()->error('Registrasi gagal, silakan coba lagi.');
            return back()->withInput();
        }
    }
}