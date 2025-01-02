<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use Throwable;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LetterHistory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Resources\DefaultResource;
use App\DataTables\RegistrationDataTable;
use App\Notifications\RegistrationApproved;
use App\Notifications\RegistrationRejected;
use App\Http\Requests\UpdateRegistrationRequest;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RegistrationDataTable $dataTable)
    {
        $allowed_status = ['pending', 'approved', 'rejected'];

        $status = request()->segment(2);

        if (!in_array($status, $allowed_status)) {
            abort(404);
        }

        $current_status = match ($status) {
            'pending' => 'Pendaftaran Diproses',
            'approved' => 'Pendaftaran Diterima',
            'rejected' => 'Pendaftaran Ditolak',
        };

        return $dataTable->render('dashboard.datamaster.registration.index', compact('current_status'));
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
    public function update(UpdateRegistrationRequest $request, User $registration)
    {
        DB::beginTransaction();

        try {

            $form = Form::where('user_id', $registration->id)->first();

            if ($request->status == 'approved') {
                try {
                    $letter_number = generate_letter_number($registration);
                    $this->generateSKRegistration($registration, $letter_number);
                    $registration->notify(new RegistrationApproved($request, $registration));
                } catch (Throwable $e) {
                    if ($request->expectsJson()) {
                        return new DefaultResource(false, $e->getMessage(), []);
                    }

                    abort(500, $e->getMessage());
                }
            } else if ($request->status == 'rejected') {
                $registration->notify(new RegistrationRejected($request, $registration));
            }

            $form->update([
                'status' => $request->status,
                'reason' => $request->input('reason') ?? null,
            ]);


            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil diperbarui', $form);
            }

            toastr()->success('Data berhasil diperbarui');

            return redirect()->back();
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
    public function destroy(Request $request, User $registration)
    {

        DB::beginTransaction();

        try {
            $form = Form::where('user_id', $registration->id)->first();
            $form->delete();
            $registration->delete();

            DB::commit();

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil dihapus', []);
            }

            toastr()->success('Data berhasil dihapus');

            return redirect()->back();
        } catch (Throwable $e) {
            DB::rollBack();

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    public function generateSKRegistration($data, $letter_number)
    {
        $name =   str_replace(' ', '_', $data->name);

        $additional_data = [
            'chairperson_name' => 'FACHRUDIN ALI',
            'general_secretary_name' => 'LIZZATUL FARHATININGSIH',
            'chairperson_signature' => 'images/profile_pictures/0yTANuswMxGr3ZzAVyMxBx0m6riNHX81urYUSRBC.jpg',
            'general_secretary_signature' => 'images/profile_pictures/0yTANuswMxGr3ZzAVyMxBx0m6riNHX81urYUSRBC.jpg',
            'letter_number' => $letter_number
        ];

        try {
            if (! File::exists("storage/letter_of_acceptance/")) {
                File::makeDirectory("storage/letter_of_acceptance/");
            }

            $pdf = Pdf::loadView('pdf.letter_of_acceptance', ['data' => $data, 'additional_data' => $additional_data])
                ->save('storage/letter_of_acceptance/' . $name . '_' . $data->id . '.pdf');

        } catch (\Exception $th) {
            return back()->with('error', 'Internal Error');
        }
    }
}
