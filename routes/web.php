<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DataMaster\UserController;
use App\Http\Controllers\Dashboard\DataMaster\SkillController;
use App\Http\Controllers\Dashboard\DataMaster\PeriodController;
use App\Http\Controllers\Dashboard\DataMaster\GolonganController;
use App\Http\Controllers\Dashboard\DataMaster\InstanceController;
use App\Http\Controllers\Dashboard\DataMaster\LetterClassificationController;
use App\Http\Controllers\Dashboard\DataMaster\PositionController;
use App\Http\Controllers\Dashboard\DataMaster\LetterLogController;
use App\Http\Controllers\Dashboard\DataMaster\RegistrationController;
use App\Http\Controllers\Dashboard\Setting\AccountSettingController;
use \App\Http\Controllers\Dashboard\Setting\UserSettingController;
use App\Http\Controllers\Dashboard\Home\BiographyController;
use App\Http\Controllers\RegistrationTrainingController;
use App\Http\Controllers\TrainingController;
use App\Models\LetterClassification;

// For guest
Route::prefix('/')->group(function () {
    Route::get('/', [BerandaController::class, 'index'])->name('landingpage');
    Route::get('/beritas', [BerandaController::class, 'get_berita'])->name('get.berita');
    Route::get('/pelatihans', [BerandaController::class, 'get_pelatihan'])->name('get.pelatihan');
    Route::get('/pages', [BerandaController::class, 'get_pages'])->name('get.pages');
    Route::get('/profil/{slug}', [BerandaController::class, 'detail_profil'])->name('detail.profil');
    Route::get('/berita', [BerandaController::class, 'berita_view'])->name('berita');
    Route::get('/berita/detail/{slug}', [BerandaController::class, 'detail_berita'])->name('detail.berita');
    Route::get('/berita/count/{slug}', [BerandaController::class, 'count_views_berita'])->name('count.berita');
    Route::get('/kontak', function () { return view('landingpage.contact');})->name('kontak');
    Route::get('/pelatihan', [BerandaController::class, 'pelatihan_view'])->name('pelatihan.index');
    Route::get('/pelatihan/detail/{slug}', [BerandaController::class, 'detail_pelatihan'])->name('detail.pelatihan');
    Route::get('/keangotaan/panduan-pendaftaran', function () { return view('landingpage.keangotaan.panduan');})->name('panduan');
    Route::get('/keangotaan/syarat-keanggotaan', function () { return view('landingpage.keangotaan.syarat');})->name('syarat');

});


// For authenticated users
Route::middleware(['auth', 'verified', 'user.status'])->group(function () {
    // Home
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Biodata Anggota
    Route::get('/biography', [BiographyController::class, 'index'])->middleware(['user.access:superadmin,admin,user'])->name('biography.index');

    // Data Master
    // Data Anggota
    Route::resource('users', UserController::class)->middleware(['user.access:superadmin,admin'])->names('users');
    Route::resource('admin/berita', BeritaController::class)->middleware(['user.access:superadmin,admin'])->names('beritas');
    Route::resource('admin/banner', BannerController::class)->middleware(['user.access:superadmin,admin'])->names('banners');
    Route::resource('admin/page-profile', PageProfileController::class)->middleware(['user.access:superadmin,admin'])->names('page-profile');
    Route::resource('admin/pelatihan', TrainingController::class)->middleware(['user.access:superadmin,admin'])->names('trainings');

    if (config("app.env") != "production") {
        Route::resource('admin/registration', RegistrationTrainingController::class)->middleware(['user.access:superadmin,admin'])->names('trainings.registration');
    }

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
    // Kode Klasifikasi
    Route::resource('letter-classifications', LetterClassificationController::class)->middleware(['user.access:superadmin'])->names('letter-classifications');

    // Setting
    // Manajemen Pengguna
    Route::resource('user-settings', UserSettingController::class)->middleware(['user.access:superadmin'])->names('user-settings');
    // Pengaturan Akun
    Route::resource('account-setting', AccountSettingController::class)->only(['index', 'update'])->names('account-setting');
});

require __DIR__ . '/auth.php';
