<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DataMaster\GolonganController;
use App\Http\Controllers\Dashboard\DataMaster\InstanceController;
use App\Http\Controllers\Dashboard\DataMaster\LetterLogController;
use App\Http\Controllers\Dashboard\DataMaster\PeriodController;
use App\Http\Controllers\Dashboard\DataMaster\PositionController;
use App\Http\Controllers\Dashboard\DataMaster\RegistrationController;
use App\Http\Controllers\Dashboard\DataMaster\SkillController;
use App\Http\Controllers\Dashboard\DataMaster\UserController;
use App\Http\Controllers\Dashboard\Setting\AccountSettingController;
use \App\Http\Controllers\Dashboard\Setting\UserSettingController;
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
    Route::resource('periods', PeriodController::class)->middleware(['user.access:superadmin'])->names('periods');
    // Jabatan
    Route::resource('positions', PositionController::class)->middleware(['user.access:superadmin'])->names('positions');
    // Instansi
    Route::resource('instances', InstanceController::class)->middleware(['user.access:superadmin'])->names('instances');
    // Pangkat/Golongan
    Route::resource('golongans', GolonganController::class)->middleware(['user.access:superadmin'])->names('golongans');
    // Keahlian
    Route::resource('skills', SkillController::class)->middleware(['user.access:superadmin'])->names('skills');
    // Keahlian
    Route::resource('letter-logs', LetterLogController::class)->middleware(['user.access:superadmin'])->names('letter-logs');

    // Setting
    // Manajemen Pengguna
    Route::resource('user-settings', UserSettingController::class)->middleware(['user.access:superadmin'])->names('user-settings');
    // Pengaturan Akun
    Route::resource('account-setting', AccountSettingController::class)->only(['index', 'update'])->names('account-setting');
});

require __DIR__ . '/auth.php';
