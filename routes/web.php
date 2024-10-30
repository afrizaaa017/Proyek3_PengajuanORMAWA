<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\FormContoller;
use App\Http\Controllers\BerkasController;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\selectedValue;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/detailPengajuan', function () {
    return view('detailPengajuan');
});


//untuk Dropdown Chain (Penting)
Route::get('/get-ukm/{ormawa_id}', [DropdownController::class, 'getUkm']);
Route::get('/get-himpunan/{ormawa_id}', [DropdownController::class, 'getHimpunan']);
Route::get('/get-bemmpm/{ormawa_id}', [DropdownController::class, 'getBemMpm']);

Route::post('/send-selected-value', [selectedValue::class, 'storeSelectedValue'])->name('send.selected.value');



//untuk View Form (Penting)
Route::post('/send-selected-value', [DropdownController::class, 'storeSelectedValue']);
Route::get('/form', [FormController::class, 'index']);
Route::post('/simpanPengajuan', [FormController::class, 'simpanPengajuan']);
Route::get('/detailPengajuan', [FormController::class, 'detailPengajuan']);
Route::get('/getKetuaOrmawa/{ormawa_id}', [FormController::class, 'getKetuaOrmawa']);
Route::get('/getProdi/{jurusan_id}', [FormController::class, 'getProdi']);


// Route::get('/pengajuanhimpunan', [PengajuanController::class, 'dropdown']);
// Route::get('/pengajuanhimpunan', [PengajuanController::class, 'pengajuanHimpunan']);

// Route::get('/pengajuanukm', [PengajuanController::class, 'pengajuanUKM']);
// Route::get('/pengajuanpusat', [PengajuanController::class, 'pengajuanPusat']);

// Route::get('/pengajuanhimpunan', function () {
//     return view('pengajuanhimpunan');
// });

// Route::get('/pengajuanpusat', function () {
//     return view('pengajuanpusat');
// });

// Route::get('/pengajuanukm', function () {
//     return view('pengajuanukm');
// });

// Rute untuk halaman upload berkas
Route::get('/pengajuanberkas', function () {
    return view('pengajuanberkas');
});

// Rute untuk halaman upload berkas
Route::get('/menu', function () {
    return view('menu');
});

Route::get('/listtable', function () {
    return view('listtable');
});

Route::get('/progrestabel', function () {
    return view('progrestabel');
});

Route::get('/progressbar', function () {
    return view('progressbar');
});

Route::get('/index', function () {
    return view('layouts.index');
});

Route::get('/menukemahasiswaan', function () {
    return view('menukemahasiswaan');
});

Route::get('send', [HomeController::class, "sendnotification"]);

Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi');
// Route::get('/notifications', [PengajuanController::class, 'getNotifications'])->name('notifications');
// Route::get('/markAsRead/{id}', [PengajuanController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/dashboard', [SubmissionController::class, 'index']);
Route::get('/semua-pengajuan', [SubmissionController::class, 'semuaPengajuan']);
