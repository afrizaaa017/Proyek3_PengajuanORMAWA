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