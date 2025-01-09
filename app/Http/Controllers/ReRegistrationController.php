<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\Skill;
use App\Models\Instance;
use App\Models\Position;
use App\Helper\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReRegistrationController extends Controller
{
    use FileHandler;
    public function __construct(
        private Form $form,
        private User $user,
    ) {}

    public function index()
    {

        return view("dashboard.daftar_ulang.index", [
            "user" => User::whereId(auth()->user()->id)->whereHas("form")->with('form.skills')->first(),
            "positions" => Position::all(),
            "instances" => Instance::all(),
            "skills" => Skill::all()
        ]);
    }

    public function payment_proof()
    {
        return view("dashboard.daftar_ulang.bukti_pembayaran");
    }

    public function payment_proof_send(Request $request, $id)
    {
        try {
            $validation = $request->validate([
                "payment_proof" => "required|image|mimes:jpeg,png,jpg|max:1024"
            ]);

            $validation["payment_proof"] = $this->fileImageHandler($request, "payment_proof", "images/payment_proof");

            $this->form->whereId($id)->update($validation);

            return redirect()->route("status-account");
        } catch (\Throwable $th) {
            return back()->withErrors('Terjadi kesalahan saat mengirim tautan verifikasi.');
        }
    }

    public function update(Request $request)
    {

        $validation = $request->validate([
            "position_id" => "required",
            "instance_id" => "required",
            "skill_id" => "required",
            "work_unit" => "required",
        ]);

        try {
            DB::transaction(function () use ($validation, $request) {

                $validation["status"] = "pending";
                $validation["payment_proof"] = null;

                $user = auth()->user();

                // Delete payment proof
                $this->isExistFile($user->form->payment_proof);

                $form = $this->form::whereId($user->form->id)->first();

                // Update
                $form->whereId($user->form->id)->update([
                    "position_id" => $request->position_id,
                    "instance_id" => $request->instance_id,
                    "work_unit" => $request->work_unit,
                    "status" => "pending",
                    "payment_proof" => null,
                ]);

                $skills = $request->input('skill_id', []);

                $form->skills()->sync($skills);
            });

            toastr()->success('!');
        } catch (\Throwable $th) {
            return back()->with("error", "Mohon maaf pesan anda gagal dikirimkan silakan hubungi admin");
        }
    }
}
