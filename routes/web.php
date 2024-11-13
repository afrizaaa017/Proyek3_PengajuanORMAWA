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

//Detail Pengajuan
Route::get('/detailPengajuan', [FormController::class, 'detailPengajuan']);
Route::patch('/pengajuan/{id}/status/{status}', [FormController::class, 'updateStatus'])->name('pengajuan.updateStatus');


// //Revisi
// Route::get('/detailPengajuan/{id}/edit', [FormController::class, 'edit'])->name('revisi.edit');
// Route::put('/detailPengajuan/{id}', [FormController::class, 'update'])->name('revisi.update');

Route::get('/listtable', [FormController::class, 'listtable']);
