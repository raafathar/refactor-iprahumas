<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DataMaster\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// For guest
Route::prefix('/')->group(function () {
    Route::get('/', function () { return view('landingpage.index'); })->name('landingpage');
    Route::get('/kontak', function () { return view('landingpage.contact');})->name('kontak');
    Route::get('/berita', function () { return view('landingpage.berita.index');})->name('berita');
    Route::get('/pelatihan', function () { return view('landingpage.pelatihan.index');})->name('pelatihan');
    Route::get('/panduan-pendaftaran', function () { return view('landingpage.keangotaan.panduan');})->name('panduan');
    Route::get('/syarat-keanggotaan', function () { return view('landingpage.keangotaan.syarat');})->name('syarat');
});


// For authenticated users
Route::middleware(['auth', 'verified', 'user.status'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Master
    Route::resource('users', UserController::class)->middleware(['user.access:superadmin,admin'])->names('users');
    Route::resource('admin/berita', BeritaController::class)->middleware(['user.access:superadmin,admin'])->names('beritas');
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
