<?php

use App\Http\Middleware\IsStaff;
use App\Http\Middleware\IsMahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\KetuaOrmawaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\SettingWaktuDeadlineController;
use App\Http\Controllers\ValidatePengajuanController;

//Pengamanan File
Route::get('/file/{id}/{filename}', [FileController::class, 'show'])->name('file.show')->middleware(['auth']);

Route::get('/index', function () {
    return view('layouts.index');
})->middleware('auth');

Route::get('/progress_bar', function () {
    return view('progressbar');
})->middleware('auth');

Route::get('send', [HomeController::class, "sendnotification"])->middleware('auth');
Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi')->middleware('auth');
Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notifications')->middleware('auth');
Route::post('/markAsRead/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead')->middleware('auth');

//setting deadline
Route::post('/dashboard', [SettingWaktuDeadlineController::class, 'updateAccesTime'])->name('update.access.time')->middleware('auth');

// Validasi pengajuan
Route::get('/validate-pengajuan-status', [ValidatePengajuanController::class, 'validatePengajuanStatus'])->name('validate-pengajuanStatus')->middleware('auth');



Route::get('/error/404', function () {
    return view('errors.404');
})->name('error.404')->middleware('auth');

Route::get('/error/500', function () {
    return view('errors.500');
})->name('error.500')->middleware('auth');


// ========================================================================================
// AUTHENTICATION ROUTES ==================================================================
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
    Route::get('/pengajuan-form', [FormController::class, 'index'])->name('form')->middleware('check.submission.access');
    Route::post('/pengajuan-form-post', [FormController::class, 'simpanPengajuan'])->name('form.simpanPengajuan');
   
    //Pengajuan Berkas
    Route::get('/pengajuan-berkas', [BerkasController::class, 'index'])->name('pengajuanberkas');
    Route::post('/pengajuan-berkas-post', [BerkasController::class, 'store'])->name('file.upload');

    //Progres Tabel
    Route::get('/progress-tabel', [BerkasController::class, 'progrestabel'])->name('progrestabel');

    //Mengambil Data Dropdown
    Route::get('/getProdi/{jurusan_id}', [ProdiController::class, 'getProdi']);
    Route::get('/getKetuaOrmawa/{ormawa_id}', [KetuaOrmawaController::class, 'getKetuaOrmawa']);

    //Revisi Pengajuan Berkas
    Route::get('/pengajuan/{nim}/edit/{id}', [FormController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{nim}/submit/{id}', [FormController::class, 'update'])->name('pengajuan.update');
    
    //Revisi Pengajuan Form
    Route::get('/pengajuan/{nim}/berkas/edit/{id}', [BerkasController::class, 'edit'])->name('berkas.edit');
    Route::put('/pengajuan/{nim}/berkas/submmit/{id}', [BerkasController::class, 'update'])->name('berkas.update');

    //Upload Surat
    Route::get('/upload/surat/{nim}/{id}', [BerkasController::class, 'indexUpdateSurat'])->name('surat.upload');
    Route::put('/submit/surat/{nim}/{id}', [BerkasController::class, 'updateSurat'])->name('surat.update');

    //Surat Keluaran 
    Route::get('/surat-pernyataan', [PdfController::class, 'suratPernyataan'])->name('surat.pernyataan');
    Route::get('/surat-perjanjian', [PdfController::class, 'suratPerjanjian'])->name('surat.perjanjian');
});

// KEMAHASISWAAN
Route::middleware(['auth', IsStaff::class])->group(function () {
    //Dashboard Kemahasiswaan
    Route::get('/dashboard-kemahasiswaan', [SubmissionController::class, 'index'])->name('dashboard')->middleware('auth');
    
    //List Tabel
    Route::get('/list-tabel', [FormController::class, 'listtable'])->name('listtable');
    Route::post('/upload-mou', [BerkasController::class, 'uploadMOU'])->name('upload-mou');
    Route::post('/upload-persyaratanPengajuan', [BerkasController::class, 'uploadPersyaratanPengajuan'])->name('upload-persyaratanPengajuan');
    
    //Detail Pengajuan
    Route::get('/detail-pengajuan/{id}', [FormController::class, 'detailPengajuan'])->name('pengajuan.detail');
    Route::patch('/pengajuan/{id}/status/{status}', [FormController::class, 'updateStatus'])->name('pengajuan.updateStatus');
    
    //Detail Surat Pendukung
    Route::get('/detail-surat/{id}', [FormController::class, 'detailSurat'])->name('surat.detail');
    
    //Kelola User
    Route::get('/kelola-user', [FormController::class, 'kelolaUser'])->name('users.index');
    Route::post('/tambah-user', [formController::class, 'storeUser'])->name('users.store');
    Route::delete('/users/{id}', [FormController::class, 'deleteUser'])->name('users.delete');

    //Data Ormawa
    Route::get('/tambah-ormawa', [KetuaOrmawaController::class, 'index'])->name('ketuaOrmawa.index');
    Route::post('/tambah-ormawa', [KetuaOrmawaController::class, 'store'])->name('ketuaOrmawa.store');
    Route::delete('/ketuaOrmawa/{id}', [KetuaOrmawaController::class, 'destroy'])->name('ketuaOrmawa.destroy');

    //Data Prodi
    Route::get('/tambah-prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::post('/tambah-prodi', [ProdiController::class, 'store'])->name('prodi.store');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

    //Data Jurusan
    Route::get('/tambah-jurusan', [ProdiController::class, 'index'])->name('jurusan.index');
    Route::post('/tambah-jurusan', [ProdiController::class, 'storeJurusan'])->name('jurusan.store');
    Route::delete('/jurusan/{id}', [ProdiController::class, 'destroyJurusan'])->name('jurusan.destroy');
    
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

