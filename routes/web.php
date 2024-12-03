<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\NotifsController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\Mahasiswacontroller;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\KetuaOrmawaController;

// ========================================================================================
// AUTHENTICATION ROUTES ==================================================================
Route::controller(AuthController::class)->group(function () {
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('layouts.index');
});

Route::get('/progressbar', function () {
    return view('progressbar');
});

Route::get('send', [HomeController::class, "sendnotification"]);

Route::get('/notifikasi', [NotifsController::class, 'index'])->name('notifikasi');
Route::get('/notifications', [NotifsController::class, 'getNotifications'])->name('notifications');
Route::post('/markAsRead/{id}', [NotifsController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/dashboard', [SubmissionController::class, 'index'])->name('dashboard');
Route::get('/semua-pengajuan', [SubmissionController::class, 'semuaPengajuan']);
Route::get('/pengajuan/create', [FormController::class, 'index'])->name('pengajuan.create');
Route::get('/dashboardmahasiswa', [Mahasiswacontroller::class, 'index'])->name('mahasiswa.index');


// MAHASISWA
Route::get('/menu', function () {
    return view('menu');
});

Route::get('/progrestabel', [FormController::class, 'progrestabel'])->name('progrestabel');

//Pengajuan Form
Route::get('/form', [FormController::class, 'index'])->name('form');
Route::post('/simpanPengajuan', [FormController::class, 'simpanPengajuan'])->name('form.simpanPengajuan');

//Mengambil Data Dropdown
Route::get('/getProdi/{jurusan_id}', [ProdiController::class, 'getProdi']);
Route::get('/getKetuaOrmawa/{ormawa_id}', [KetuaOrmawaController::class, 'getKetuaOrmawa']);

//Pengajuan Berkas
Route::get('/pengajuanberkas', [BerkasController::class, 'index'])->name('pengajuanberkas');
Route::post('/pengajuanberkas', [BerkasController::class, 'store'])->name('file.upload');


// KEMAHASISWAAN
Route::get('/menukemahasiswaan', function () {
    return view('menukemahasiswaan');
});

Route::get('/listtable', function () {
    return view('listtable');
});
// Route::get('/dashboardmahasiswa', function () {
//     return view('dashboardmahasiswa');
// });

Route::get('/TambahOrmawa', [KetuaOrmawaController::class, 'index'])->name('ketuaOrmawa.index');
Route::post('/TambahOrmawa', [KetuaOrmawaController::class, 'store'])->name('ketuaOrmawa.store');
Route::delete('/ketuaOrmawa/{id}', [KetuaOrmawaController::class, 'destroy'])->name('ketuaOrmawa.destroy');

Route::get('/TambahProdi', [ProdiController::class, 'index'])->name('prodi.index');
Route::post('/TambahProdi', [ProdiController::class, 'store'])->name('prodi.store');
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

Route::get('/TambahJurusan', [ProdiController::class, 'index'])->name('prodi.index');
Route::post('/TambahJurusan', [ProdiController::class, 'storeJurusan'])->name('jurusan.store');
Route::delete('/jurusan/{id}', [ProdiController::class, 'destroyJurusan'])->name('jurusan.destroy');

//Detail Pengajuan
// Route::get('/detailPengajuan', [FormController::class, 'detailPengajuan']);
Route::get('/detail-pengajuan/{id}', [FormController::class, 'detailPengajuan'])->name('pengajuan.detail');
Route::patch('/pengajuan/{id}/status/{status}', [FormController::class, 'updateStatus'])->name('pengajuan.updateStatus');


// //Revisi
Route::post('/detailPengajuan', [FormController::class, 'store'])->name('revisi.store');
Route::get('/detailPengajuan/{id}/edit', [FormController::class, 'edit'])->name('revisi.edit');
Route::put('/detailPengajuan/{id}', [FormController::class, 'update'])->name('revisi.update');

//Timelinee
Route::get('/admin', [TimelineController::class, 'index'])->name('admin.index');
Route::resource('timelines', TimelineController::class);
Route::post('/timeline', [TimelineController::class, 'store'])->name('timeline.store');
Route::put('/timeline/{id}', [TimelineController::class, 'update'])->name('timeline.update');
Route::delete('timelines/{timeline}', [TimelineController::class, 'destroy'])->name('admin.destroy');







Route::get('/listtable', [FormController::class, 'listtable']);
