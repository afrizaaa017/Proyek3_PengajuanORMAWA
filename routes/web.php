<?php

use App\Http\Middleware\IsMahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\NotifsController;
use App\Http\Controllers\updateAccesstime;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\Mahasiswacontroller;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\KetuaOrmawaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PDFController;
use App\Http\Middleware\IsStaff;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SafePDFController;

use App\Http\Controllers\validatepengajuan;
use App\Http\Controllers\Settingwaktudeadline;
use App\Http\Controllers\DashboardMahasiswaController;

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

// MAHASISWA
Route::middleware(['auth', IsMahasiswa::class])->group(function () {
    // Route::get('/dashboardmahasiswa', [Mahasiswacontroller::class, 'index'])->name('mahasiswa.index');
    Route::get('/dashboardmahasiswa', [DashboardMahasiswaController::class, 'index'])->name('mahasiswa.index');
    // Route::post('/dashboardmahasiswa', [BerkasController::class, 'store'])->name('file.upload');

    // Route::get('/pengajuan/create', [FormController::class, 'index'])->name('pengajuan.create');
    Route::get('/progrestabel', [BerkasController::class, 'progrestabel'])->name('progrestabel');

    //Pengajuan Form
    Route::get('/form', [FormController::class, 'index'])->name('form')->middleware('check.submission.access');
    Route::post('/simpanPengajuan', [FormController::class, 'simpanPengajuan'])->name('form.simpanPengajuan');

    //Mengambil Data Dropdown
    Route::get('/getProdi/{jurusan_id}', [ProdiController::class, 'getProdi']);
    Route::get('/getKetuaOrmawa/{ormawa_id}', [KetuaOrmawaController::class, 'getKetuaOrmawa']);

    //Pengajuan Berkas
    Route::get('/pengajuanberkas', [BerkasController::class, 'index'])->name('pengajuanberkas');
    Route::post('/pengajuanberkas', [BerkasController::class, 'store'])->name('file.upload');

    //Revisi
    Route::get('/pengajuan/{nim}/edit/{id}', [FormController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{nim}/submit/{id}', [FormController::class, 'update'])->name('pengajuan.update');
    Route::get('/pengajuan/{nim}/berkas/edit/{id}', [BerkasController::class, 'edit'])->name('berkas.edit');
    Route::put('/pengajuan/{nim}/berkas/submmit/{id}', [BerkasController::class, 'update'])->name('berkas.update');

    //Surat

    Route::get('/upload/surat/{nim}/{id}', [BerkasController::class, 'indexUpdateSurat'])->name('surat.upload');
    Route::put('/submit/surat/{nim}/{id}', [BerkasController::class, 'updateSurat'])->name('surat.update');
});

// KEMAHASISWAAN
    Route::get('/kelolaUser', [FormController::class, 'kelolaUser'])->name('users.index');
    Route::post('/tambahUser', [formController::class, 'storeUser'])->name('users.store');
    Route::delete('/users/{id}', [FormController::class, 'deleteUser'])->name('users.delete');

    Route::middleware(['auth', IsStaff::class])->group(function () {
    Route::get('/dashboard', [SubmissionController::class, 'index'])->name('dashboard');

    Route::get('/TambahOrmawa', [KetuaOrmawaController::class, 'index'])->name('ketuaOrmawa.index');
    Route::post('/TambahOrmawa', [KetuaOrmawaController::class, 'store'])->name('ketuaOrmawa.store');
    Route::delete('/ketuaOrmawa/{id}', [KetuaOrmawaController::class, 'destroy'])->name('ketuaOrmawa.destroy');

    Route::get('/TambahProdi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::post('/TambahProdi', [ProdiController::class, 'store'])->name('prodi.store');
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

    Route::get('/TambahJurusan', [ProdiController::class, 'index'])->name('jurusan.index');
    Route::post('/TambahJurusan', [ProdiController::class, 'storeJurusan'])->name('jurusan.store');
    Route::delete('/jurusan/{id}', [ProdiController::class, 'destroyJurusan'])->name('jurusan.destroy');

    //Detail Pengajuan
    // Route::get('/detailPengajuan', [FormController::class, 'detailPengajuan']);
    Route::middleware(['auth', 'role:staff_kemahasiswaan'])->group(function () {
        Route::get('/detail-pengajuan/{id}', [FormController::class, 'detailPengajuan'])->name('pengajuan.detail');
    });
    
    Route::get('/detail-pengajuan/{id}', [FormController::class, 'detailPengajuan'])->name('pengajuan.detail');
    Route::patch('/pengajuan/{id}/status/{status}', [FormController::class, 'updateStatus'])->name('pengajuan.updateStatus');
    
    Route::get('/detail-surat/{id}', [FormController::class, 'detailSurat'])->name('surat.detail');
    // //Revisi
    // Route::post('/detailPengajuan', [FormController::class, 'store'])->name('revisi.store');
    // Route::get('/detailPengajuan/{id}/edit', [FormController::class, 'edit'])->name('revisi.edit');
    // Route::put('/detailPengajuan/{id}', [FormController::class, 'update'])->name('revisi.update');

    //  PDF Safe
    Route::middleware(['auth', IsStaff::class])->group(function () {
        Route::get('/storage/laraview/{id}/{filename}', [FileController::class, 'serveFile'])->name('serve.file');
    });
    Route::middleware(['auth',IsStaff::class])->get('private/laraview/{id}/{filename}',
     [SafePDFController::class, 'showPDF'])->name('berkas.show');

     Route::get('private/laraview/{id}/{filename}', [SafePDFController::class, 'showPDF'])
    ->middleware(['auth', IsStaff::class])
    ->name('berkas.show');

    Route::middleware(['auth', IsStaff::class])->group(function () {
        Route::get('/pdf/{id}/{filename}', [SafePDFController::class, 'showPDF'])->name('pdf.show');
    });

    // Route::get('/preview-pdf/{id}/{filename}', [SafePDFController::class, 'showPDF'])
    // ->middleware('auth')
    // ->name('preview.pdf');



    //  Route::middleware(['auth', 'is.staff'])->get('/berkas/{id}/{filename}',
    //   [SafePDFController::class, 'showPDF'])->name('berkas.show');

    

    //Timelinee
    Route::get('/admin', [TimelineController::class, 'index'])->name('admin.index');
    Route::resource('timelines', TimelineController::class);
    Route::post('/timeline', [TimelineController::class, 'store'])->name('timeline.store');
    Route::put('/timeline/{id}', [TimelineController::class, 'update'])->name('timeline.put');
    Route::delete('timelines/{timeline}', [TimelineController::class, 'destroy'])->name('timeline.destroy');
    Route::get('/timelines/{id}/edit', [TimelineController::class, 'edit'])->name('timeline.edit');
    Route::put('/timelines/{id}', [TimelineController::class, 'update'])->name('timeline.update');

    Route::get('/listtable', [FormController::class, 'listtable'])->name('listtable');
    Route::post('/upload-mou', [BerkasController::class, 'uploadMOU'])->name('upload-mou');
    // Route::post('/delete-sk', [BerkasController::class, 'deleteSK'])->name('delete-sk');
});


Route::get('/index', function () {
    return view('layouts.index');
});

Route::get('/progressbar', function () {
    return view('progressbar');
});

Route::get('send', [HomeController::class, "sendnotification"]);

Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi');
Route::get('/notifications', [NotificationController::class, 'getNotifications'])->name('notifications');
Route::post('/markAsRead/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

// Route::get('/semua-pengajuan', [SubmissionController::class, 'semuaPengajuan']);

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/', function () {
    return view('pages.Auth.login');
});

//setting deadline
Route::post('/dashboard', [Settingwaktudeadline::class, 'updateAccesTime'])->name('update.access.time');

// Validasi pengajuan
Route::get('/validate-pengajuan-status', [validatepengajuan::class, 'validatePengajuanStatus']);








Route::get('/suratPernyataan', [PDFController::class, 'suratPernyataan'])->name('surat.pernyataan');
Route::get('/suratPerjanjian', [PDFController::class, 'suratPerjanjian'])->name('surat.perjanjian');


Route::get('/error/404', function () {
    return view('errors.404');
})->name('error.404');

Route::get('/error/500', function () {
    return view('errors.500');
})->name('error.500');



// Route::get('/surat', function () {
//     return view('pdf');
// });
