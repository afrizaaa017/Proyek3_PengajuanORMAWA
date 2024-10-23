<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\FormContoller;
use App\Http\Controllers\BerkasController;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JurusanController;

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
Route::get('/getProdi/{jurusan_id}', [FormController::class, 'getProdi']);


//untuk View Form (Penting)
Route::get('/form', [FormController::class, 'index']);
Route::post('/simpanPengajuan', [FormController::class, 'simpanPengajuan']);
Route::get('/detailPengajuan', [FormController::class, 'detailPengajuan']);



// Route::get('/pengajuanhimpunan', [PengajuanController::class, 'dropdown']);
// Route::get('/pengajuanhimpunan', [PengajuanController::class, 'pengajuanHimpunan']);

// Route::get('/pengajuanukm', [PengajuanController::class, 'pengajuanUKM']);
// Route::get('/pengajuanpusat', [PengajuanController::class, 'pengajuanPusat']);

Route::post('/simpanPengajuan', [PengajuanController::class, 'simpanPengajuan']);
Route::get('/detailPengajuan', [PengajuanController::class, 'detailPengajuan']);

Route::get('/pengajuanberkas', [BerkasController::class, 'index']);
Route::post('/pengajuanberkas', [BerkasController::class, 'store'])->name('file.upload');

Route::get('/detailupload', [BerkasController::class, 'read'])->name('file.index');


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
    return view('index');
});


