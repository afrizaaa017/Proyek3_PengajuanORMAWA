<?php

use App\Http\Controllers\BerkasController;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detailPengajuan', function () {
    return view('detailPengajuan');
});

Route::get('/pengajuanhimpunan', [PengajuanController::class, 'pengajuanHimpunan']);
Route::post('api/BEM_UKM', [PengajuanController::class, 'BEM_UKM']);
Route::post('api/Himpunan', [PengajuanController::class, 'Himpunan']);
Route::post('api/UKM', [PengajuanController::class, 'UKM']);
Route::post('api/Ormawa', [PengajuanController::class, 'Ormawas']);

Route::get('/pengajuanukm', [PengajuanController::class, 'pengajuanUKM']);
Route::get('/pengajuanpusat', [PengajuanController::class, 'pengajuanPusat']);

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

Route::get('/menukemahasiswaan', function () {
    return view('menukemahasiswaan');
});


