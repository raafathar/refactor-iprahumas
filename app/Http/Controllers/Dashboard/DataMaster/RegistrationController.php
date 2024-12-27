<?php

namespace App\Http\Controllers\Dashboard\DataMaster;

use App\DataTables\RegistrationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function update(Request $request, string $id)
    {
        //
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
}