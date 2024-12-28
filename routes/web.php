<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DataMaster\PeriodController;
use App\Http\Controllers\Dashboard\DataMaster\PositionController;
use App\Http\Controllers\Dashboard\DataMaster\RegistrationController;
use App\Http\Controllers\Dashboard\DataMaster\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// For guest
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('landingpage');
});


// For authenticated users
Route::middleware(['auth', 'verified', 'user.status'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Master
    // Data Anggota
    Route::resource('users', UserController::class)->middleware(['user.access:superadmin,admin'])->names('users');
    // Data Pendaftar
    Route::get('registration/{status}', [RegistrationController::class, 'index'])->name('registration.index')->middleware(['user.access:superadmin,admin']);
    Route::resource('registration', RegistrationController::class)->except(['index'])->middleware(['user.access:superadmin,admin'])->names('registration');
    // Periode Pendaftaran
    Route::resource('periods', PeriodController::class)->middleware(['user.access:superadmin,admin'])->names('periods');
    // Jabatan
    Route::resource('positions', PositionController::class)->middleware(['user.access:superadmin,admin'])->names('positions');
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';