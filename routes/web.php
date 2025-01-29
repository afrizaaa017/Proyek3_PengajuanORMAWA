<?php

use App\Http\Middleware\IsStaff;
use App\Http\Middleware\IsMahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\KetuaOrmawaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ValidatePengajuanController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\SettingWaktuDeadlineController;
use App\Http\Controllers\DashboardKemahasiswaanController;

// AUTH
Route::middleware(['auth'])->group(function () {
    // File routes
    Route::get('/file/{id}/{filename}', [FileController::class, 'show'])->name('file.show');

    // Halaman utama
    Route::get('/index', function () {
        return view('layouts.index');
    });

    // Halaman progress bar
    Route::get('/progress_bar', function () {
        return view('progressbar');
    });

    // Notification routes
    Route::get('send', [HomeController::class, "sendnotification"]);
    Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi');
    Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notifications');
    Route::post('/markAsRead/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    // Setting deadline
    Route::post('/dashboard', [SettingWaktuDeadlineController::class, 'updateAccesTime'])->name('update.access.time');

    // Validasi pengajuan
    Route::get('/validate-pengajuan-status', [ValidatePengajuanController::class, 'validatePengajuanStatus'])->name('validate-pengajuanStatus');

    // Error routes
    Route::get('/error/404', function () {
        return view('Errors.404');
    })->name('error.404');

    Route::get('/error/500', function () {
        return view('Errors.500');
    })->name('error.500');
});

// AUTENTIKASI
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login.submit');

    // Forgot password process
    Route::post('/forgot-password', 'forgotPassword')->name('password.forgot');
    Route::post('/verify-code', 'verifyCode')->name('password.verifyCode');
    Route::get('/reset-password', 'showResetPasswordForm')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');

    // Logout route should be outside the '/home' route
    Route::post('/logout', 'logout')->name('logout');
});

// MAHASISWA
Route::middleware(['auth', IsMahasiswa::class])->group(function () {
    //Dashboard Mahasiswa
    Route::get('/dashboard-mahasiswa', [DashboardMahasiswaController::class, 'index'])->name('mahasiswa.index');

    //Pengajuan Form
    Route::get('/pengajuan-biodata', [BiodataController::class, 'createBiodata'])->name('pengajuan.biodata.create')->middleware('check.submission.access');
    Route::post('/pengajuan-biodata-post', [BiodataController::class, 'storeBiodata'])->name('pengajuan.biodata.store');

    //Pengajuan Berkas
    Route::get('/pengajuan-berkas', [BerkasController::class, 'createBerkas'])->name('pengajuan.berkas.create');
    Route::post('/pengajuan-berkas-post', [BerkasController::class, 'storeBerkas'])->name('pengajuan.berkas.store');

    //Progres Tabel
    Route::get('/progress-tabel', [ProgressController::class, 'showProgress'])->name('progress.tabel.show');

    //Mengambil Data Dropdown
    Route::get('/getProdi/{jurusan_id}', [ProdiController::class, 'getProdi']);
    Route::get('/getKetuaOrmawa/{ormawa_id}', [KetuaOrmawaController::class, 'getKetuaOrmawa']);

    //Revisi Pengajuan Biodata
    Route::get('/pengajuan/{nim}/edit-biodata/{id}', [BiodataController::class, 'editBiodata'])->name('pengajuan.biodata.edit');
    Route::put('/pengajuan/{nim}/submit-biodata/{id}', [BiodataController::class, 'updateBiodata'])->name('pengajuan.biodata.update');

    //Revisi Pengajuan Berkas
    Route::get('/pengajuan/{nim}/edit-berkas/edit/{id}', [BerkasController::class, 'editBerkas'])->name('pengajuan.berkas.edit');
    Route::put('/pengajuan/{nim}/submmit-berkas/{id}', [BerkasController::class, 'updateBerkas'])->name('pengajuan.berkas.update');

    //Upload Surat
    Route::get('/upload/surat/{nim}/{id}', [BerkasController::class, 'createSurat'])->name('surat.pendukung.create');
    Route::put('/submit/surat/{nim}/{id}', [BerkasController::class, 'updateSurat'])->name('surat.pendukung.update');

    //Surat Keluaran 
    Route::get('/surat-pernyataan', [PdfController::class, 'createSuratPernyataan'])->name('surat.pernyataan.create');
    Route::get('/surat-perjanjian', [PdfController::class, 'createSuratPerjanjian'])->name('surat.perjanjian.create');
});

// KEMAHASISWAAN
Route::middleware(['auth', IsStaff::class])->group(function () {
    //Dashboard Kemahasiswaan
    Route::get('/dashboard-kemahasiswaan', [DashboardKemahasiswaanController::class, 'index'])->name('kemahasiswaan.index')->middleware('auth');

    //List Tabel
    Route::get('/list-pengajuan', [PengajuanController::class, 'indexListPengajuan'])->name('list.pengajuan.index');
    Route::post('/upload-mou', [BerkasController::class, 'storeMou'])->name('template.mou.store');
    Route::post('/upload-persyaratanPengajuan', [BerkasController::class, 'storePersyaratan'])->name('surat.persyaratan.pengajuan.store');

    //Detail Pengajuan
    Route::get('/detail-pengajuan/{id}', [PengajuanController::class, 'showDetailPengajuan'])->name('pengajuan.detail.show');
    Route::patch('/pengajuan/{id}/status/{status}', [PengajuanController::class, 'updateStatusPengajuan'])->name('pengajuan.status.update');

    //Detail Surat Pendukung
    Route::get('/detail-surat/{id}', [PengajuanController::class, 'showDetailSurat'])->name('surat.detail.show');

    //Kelola User
    Route::get('/kelola-user', [UserController::class, 'createUser'])->name('users.index');
    Route::post('/tambah-user', [UserController::class, 'storeUser'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroyUser'])->name('users.destroy');

    //Data Ormawa
    Route::get('/tambah-ormawa', [KetuaOrmawaController::class, 'indexOrmawa'])->name('ketuaOrmawa.index');
    Route::post('/tambah-ormawa', [KetuaOrmawaController::class, 'storeOrmawa'])->name('ketuaOrmawa.store');
    Route::delete('/ketuaOrmawa/{id}', [KetuaOrmawaController::class, 'destroyOrmawa'])->name('ketuaOrmawa.destroy');

    //Data Prodi
    Route::get('/tambah-prodi', [ProdiController::class, 'indexProdiJurusan'])->name('prodi.index');
    Route::post('/tambah-prodi', [ProdiController::class, 'storeProdi'])->name('prodi.store');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroyProdi'])->name('prodi.destroy');

    //Data Jurusan
    Route::get('/tambah-jurusan', [ProdiController::class, 'indexProdiJurusan'])->name('jurusan.index');
    Route::post('/tambah-jurusan', [JurusanController::class, 'storeJurusan'])->name('jurusan.store');
    Route::delete('/jurusan/{id}', [JurusanController::class, 'destroyJurusan'])->name('jurusan.destroy');

    //Timelinee
    Route::get('/timeline', [TimelineController::class, 'index'])->name('admin.index');
    Route::resource('timelines', TimelineController::class);
    Route::post('/timeline', [TimelineController::class, 'store'])->name('timeline.store');
    Route::put('/timeline/{id}', [TimelineController::class, 'update'])->name('timeline.put');
    Route::delete('timelines/{timeline}', [TimelineController::class, 'destroy'])->name('timeline.destroy');
    Route::get('/timelines/{id}/edit', [TimelineController::class, 'edit'])->name('timeline.edit');
    Route::put('/timelines/{id}', [TimelineController::class, 'update'])->name('timeline.update');

    // Route::post('/delete-sk', [BerkasController::class, 'deleteSK'])->name('delete-sk');
});
