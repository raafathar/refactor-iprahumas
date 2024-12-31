<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
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
    Route::resource('users', UserController::class)->middleware(['user.access:superadmin,admin'])->names('users');
    Route::resource('admin/berita', BeritaController::class)->middleware(['user.access:superadmin,admin'])->names('beritas');
    Route::resource('admin/banner', BannerController::class)->middleware(['user.access:superadmin,admin'])->names('banners');
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
