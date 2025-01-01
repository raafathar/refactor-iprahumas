<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DataMaster\GolonganController;
use App\Http\Controllers\Dashboard\DataMaster\InstanceController;
use App\Http\Controllers\Dashboard\DataMaster\LetterLogController;
use App\Http\Controllers\Dashboard\DataMaster\PeriodController;
use App\Http\Controllers\Dashboard\DataMaster\PositionController;
use App\Http\Controllers\Dashboard\DataMaster\RegistrationController;
use App\Http\Controllers\Dashboard\DataMaster\SkillController;
use App\Http\Controllers\Dashboard\DataMaster\UserController;


// For guest
Route::prefix('/')->group(function () {
    Route::get('/', [BerandaController::class, 'index'])->name('landingpage');
    Route::get('/beritas', [BerandaController::class, 'get_berita'])->name('get.berita');
    Route::get('/berita', [BerandaController::class, 'berita_view'])->name('berita');
    Route::get('/berita/detail/{slug}', [BerandaController::class, 'detail_berita'])->name('detail.berita');
    Route::get('/kontak', function () { return view('landingpage.contact');})->name('kontak');
    Route::get('/pelatihan', function () { return view('landingpage.pelatihan.index');})->name('pelatihan');
    Route::get('/keangotaan/panduan-pendaftaran', function () { return view('landingpage.keangotaan.panduan');})->name('panduan');
    Route::get('/keangotaan/syarat-keanggotaan', function () { return view('landingpage.keangotaan.syarat');})->name('syarat');
    Route::get('/profil/sejarah', function () { return view('landingpage.profil.sejarah');})->name('sejarah');
    Route::get('/profil/manfaat-anggota', function () { return view('landingpage.profil.manfaat_anggota');})->name('manfaat_anggota');
});


// For authenticated users
Route::middleware(['auth', 'verified', 'user.status'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Master
    // Data Anggota
    Route::resource('users', UserController::class)->middleware(['user.access:superadmin,admin'])->names('users');
    Route::resource('admin/berita', BeritaController::class)->middleware(['user.access:superadmin,admin'])->names('beritas');
    Route::resource('admin/banner', BannerController::class)->middleware(['user.access:superadmin,admin'])->names('banners');
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
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
