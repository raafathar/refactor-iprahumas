<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationTraining;
use App\Http\Resources\DefaultResource;
use App\Http\Requests\RegistrationTrainingRequest;

class RegistrationTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(RegistrationTrainingRequest $request)
    {
        try {
            $validation = $request->validated();

            RegistrationTraining::create($validation);

            if ($request->expectsJson()) {
                return new DefaultResource(true, 'Data berhasil ditambahkan', []);
            }

            toastr()->success('Data berhasil ditambahkan');

            return redirect()->route('dashboard.datamaster.user.index');
        } catch (\Throwable $e) {

            if ($request->expectsJson()) {
                return new DefaultResource(false, $e->getMessage(), []);
            }

            abort(500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrationTraining $registrationTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrationTraining $registrationTraining)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegistrationTrainingRequest $request, RegistrationTraining $registrationTraining)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrationTraining $registrationTraining)
    {
        //
    }
}
