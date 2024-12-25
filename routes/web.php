<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Dashboard\DashboardController;
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
    Route::resource('users', UserController::class)->middleware(['user.access:superadmin,admin'])->names('users');
    Route::resource('admin/berita', BeritaController::class)->middleware(['user.access:superadmin,admin'])->names('beritas');
});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
