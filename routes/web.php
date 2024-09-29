<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pengajuanhimpunan', function () {
    return view('pengajuanhimpunan');
});

Route::get('/pengajuanpusat', function () {
    return view('pengajuanpusat');
});

Route::get('/pengajuanukm', function () {
    return view('pengajuanukm');
});

// Rute untuk halaman upload berkas
Route::get('/pengajuanberkas', function () {
    return view('pengajuanberkas');
});
