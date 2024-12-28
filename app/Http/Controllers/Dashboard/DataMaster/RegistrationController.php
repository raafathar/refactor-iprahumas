<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\RegistrationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Http\Resources\DefaultResource;
use App\Models\Form;
use App\Models\LetterHistory;
use App\Models\User;
use App\Notifications\RegistrationApproved;
use App\Notifications\RegistrationRejected;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

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
                    $letter_number = $this->generateLetterNumber($registration);
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

    public function generateLetterNumber($data)
    {
        $new_sequence = (LetterHistory::max('number_sequence') ?? 0) + 1;
        $formatted_sequence = str_pad($new_sequence, 4, '0', STR_PAD_LEFT);
        $letter_type = "SK.ANGGOTA";

        $letter_number = "{$formatted_sequence}/" . config('app.name') . "/{$letter_type}/" . now()->month . "/" . now()->year;

        LetterHistory::create([
            'letter_number' => $letter_number,
            'number_sequence' => $new_sequence,
            'sender' => config('app.name'),
            'letter_type' => $letter_type,
            'letter_date' => now(),
            'recipient' => $data->name,
            'created_by' => Auth::user()->id,
        ]);

        return $letter_number;
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
            $pdf = Pdf::loadView('pdf.letter_of_acceptance', ['data' => $data, 'additional_data' => $additional_data])
                ->save('storage/letter_of_acceptance/' . $name . '_' . $data->id . '.pdf');
        } catch (\Exception $th) {
            return back()->with('error', 'Internal Error');
        }
    }
}