<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BerkasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KetuaOrmawaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SubmissionController;


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

Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi');
// Route::get('/notifications', [PengajuanController::class, 'getNotifications'])->name('notifications');
// Route::get('/markAsRead/{id}', [PengajuanController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/dashboard', [SubmissionController::class, 'index']);
Route::get('/semua-pengajuan', [SubmissionController::class, 'semuaPengajuan']);


// MAHASISWA
Route::get('/menu', function () {
    return view('menu');
});

Route::get('/progrestabel', [FormController::class, 'progrestabel']);
    
//Pengajuan Form
Route::get('/form', [FormController::class, 'index']);
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
Route::get('/detailPengajuan', [FormController::class, 'detailPengajuan']);
Route::patch('/pengajuan/{id}/status/{status}', [FormController::class, 'updateStatus'])->name('pengajuan.updateStatus');

//Kemahasiswaan Dashboard
Route::get('/dashboardmahasiswa', function () {
    return view('dashboardmahasiswa'); 
});


// //Revisi
Route::post('/detailPengajuan', [FormController::class, 'store'])->name('revisi.store');
Route::get('/detailPengajuan/{id}/edit', [FormController::class, 'edit'])->name('revisi.edit');
Route::put('/detailPengajuan/{id}', [FormController::class, 'update'])->name('revisi.update');

Route::get('/listtable', [FormController::class, 'listtable']);
