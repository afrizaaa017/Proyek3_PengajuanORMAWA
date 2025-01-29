<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berkas;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBerkasRequest;
use App\Http\Requests\UpdateBerkasRequest;
use App\Notifications\PengajuanNotifikasi;
use Illuminate\Support\Facades\Notification;

class BerkasController extends Controller
{
    //Menampilkan form untuk menambah data berkas pengajuan baru
    public function createBerkas()
    {
        if (!session()->has('pengajuan')) {
            return redirect()->route('pengajuan.biodata.create')->with('error', 'Harap lengkapi data biodata terlebih dahulu.');
        }
        $pengajuanData = session('pengajuan');
        return view('Pages.Mahasiswa.pengajuan_berkas', ['pengajuanData' => $pengajuanData]);
    }

    //Menyimpan data biodata dan data berkas pengajuan baru ke database
    public function storeBerkas(StoreBerkasRequest $request)
    {
        $pengajuanData = session('pengajuan');

        $pengajuan = Pengajuan::create($pengajuanData);
        $berkas = new Berkas();

        $folderPath = 'app/PDF/' . $pengajuan->id;
        $publicPath = storage_path($folderPath);

        if (!Storage::makeDirectory($folderPath)) {
            return redirect()->back()->withErrors('Gagal membuat direktori untuk penyimpanan berkas.');
        }
        $fileFields = [
            'scan_ktp',
            'surat_sehat',
            'surat_rekomendasi_jurusan',
            'transkip_rekomendasi_jurusan',
            'sertifikat_lkmm',
            'sertifikat_pelatihan_kepemimpinan',
            'sertifikat_pelatihan_emosional_spiritual',
            'sertifikat_bahasa_asing',
            'scan_ktm',
            'surat_keterangan_berkelakuan_baik',
            'surat_penyataan_mandiri',
            'sertifikat_pkkmb',
            'sertifikat_bela_negara',
            'sertifikat_agent_of_change',
            'sertifikat_berorganisasi',
            'berita_acara_pemilihan',
            'surat_pernyataan',
            'surat_perjanjian',
            'surat_mou',
            'surat_kak',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                try {
                    $fileName = 'Pengaju_' . $pengajuan->id . '_' . $field . '.pdf';
                    $request->file($field)->move($publicPath, $fileName);
                    $berkas->$field = $fileName;
                } catch (\Exception $e) {
                    Log::error("Gagal mengunggah file $field untuk pengajuan ID: {$pengajuan->id}. Error: {$e->getMessage()}");
                    $berkas->$field = 'data gagal terupload';
                }
            }
            else {
                $berkas->$field = 'pengaju tidak mengirimkan file ini';
            }
        }

        $request->session()->put('berkas', [
            'scan_ktp' => Auth::id()
        ]);

        $berkas->pengajuan_id = $pengajuan->id;
        $berkas->save();

        //notifikasi mahasiswa
        // $pengajuan->user->notify(new PengajuanNotifikasi($pengajuan->toArray()));
        $user = User::find($pengajuan->user_id);
        $user->notify(new PengajuanNotifikasi($pengajuan, 'baru', false));
        // $pengajuan->user->notify(new PengajuanNotifikasi($pengajuan, 'baru', false));

        // Notifikasi ke staff_polban
        $staffs = User::where('role_id', 'staff_kemahasiswaan')->get();
        Notification::send($staffs, new PengajuanNotifikasi($pengajuan, 'baru', true));

        $request->session()->forget('pengajuan');
        return redirect()->route('progress.tabel.show')->with('success', 'Pengajuan berhasil disimpan.');
    }

    //Menampilkan form untuk mengedit data berkas pengajuan tertentu
    public function editBerkas($nim, $id)
    {
        $revisiPengajuan = session('revisiPengajuan');
        $pengajuan = Pengajuan::with('berkas')
            ->where('id', $id)
            ->where('nim', $nim)
            ->firstOrFail();

        return view('Pages.Mahasiswa.revisi_pengajuan_berkas', ['nim' => $nim, 'pengajuan' => $pengajuan, 'revisiPengajuan' => $revisiPengajuan]);
    }

    //Memperbarui data biodata dan data berkas pengajuan tertentu di database
    public function updateBerkas(UpdateBerkasRequest $request, $nim, $id)
    {
        $revisiPengajuan = session('revisiPengajuan');

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update($revisiPengajuan);
        $pengajuan->status = PengajuanStatus::MenungguVerifikasiUlang;
        $pengajuan->save();
        $berkas = $pengajuan->berkas;

        $folderPath = 'app/PDF/' . $pengajuan->id;
        $publicPath = storage_path($folderPath);

        if (!Storage::makeDirectory($folderPath)) {
            return redirect()->back()->withErrors('Gagal membuat direktori untuk penyimpanan berkas.');
        }
        $fileFields = [
            'scan_ktp',
            'surat_sehat',
            'surat_rekomendasi_jurusan',
            'transkip_rekomendasi_jurusan',
            'sertifikat_lkmm',
            'sertifikat_pelatihan_kepemimpinan',
            'sertifikat_pelatihan_emosional_spiritual',
            'sertifikat_bahasa_asing',
            'scan_ktm',
            'surat_keterangan_berkelakuan_baik',
            'surat_penyataan_mandiri',
            'sertifikat_pkkmb',
            'sertifikat_bela_negara',
            'sertifikat_agent_of_change',
            'sertifikat_berorganisasi',
            'berita_acara_pemilihan',
            'surat_pernyataan',
            'surat_perjanjian',
            'surat_mou',
            'surat_kak',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                try {
                    $fileName = 'Pengaju_' . $pengajuan->id . '_' . $field . '.pdf';
                    $request->file($field)->move($publicPath, $fileName);
                    $berkas->$field = $fileName;
                } catch (\Exception $e) {
                    Log::error("Gagal mengunggah file $field untuk pengajuan ID: {$pengajuan->id}. Error: {$e->getMessage()}");
                    $berkas->$field = 'data gagal terupload';
                }
            }
        }

        $berkas->save();

        $user = User::find($pengajuan->user_id);
        $user->notify(new PengajuanNotifikasi($pengajuan, 'revisi_dikirim', false));

        // Notifikasi ke staff_polban
        $staffs = User::where('role_id', 'staff_kemahasiswaan')->get();
        Notification::send($staffs, new PengajuanNotifikasi($pengajuan, 'revisi_dikirim', true));

        return redirect()->route('progress.tabel.show')->with('success', 'Data updated successfully');
    }

    //Menampilkan form untuk mengirim surat pendukung
    public function createSurat($nim, $id)
    {
        $pengajuan = Pengajuan::with('berkas')
            ->where('user_id', Auth::id())
            ->where('id', $id)
            ->where('nim', $nim)
            ->firstOrFail();

        return view('Pages.Mahasiswa.upload_surat_pendukung', ['pengajuan' => $pengajuan]);
    }

    //Memperbarui data surat pendukung pengajuan tertentu di database
    public function updateSurat(UpdateBerkasRequest $request, $nim, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $berkas = $pengajuan->berkas;

        $folderPath = 'app/PDF/' . $pengajuan->id;
        $publicPath = storage_path($folderPath);

        if (!Storage::makeDirectory($folderPath)) {
            return redirect()->back()->withErrors('Gagal membuat direktori untuk penyimpanan berkas.');
        }
        $fileFields = [
            'surat_pernyataan',
            'surat_perjanjian',
            'surat_mou',
            'surat_kak',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                try {
                    $fileName = 'Pengaju_' . $pengajuan->id . '_' . $field . '.pdf';
                    $request->file($field)->move($publicPath, $fileName);
                    $berkas->$field = $fileName;
                } catch (\Exception $e) {
                    Log::error("Gagal mengunggah file $field untuk pengajuan ID: {$pengajuan->id}. Error: {$e->getMessage()}");
                    $berkas->$field = 'data gagal terupload';
                }
            }
        }
        
        $berkas->save();

        // $user = User::find($pengajuan->user_id);
        // $user->notify(new PengajuanNotifikasi($pengajuan, 'revisi_dikirim', false));

        // // Notifikasi ke staff_polban
        // $staffs = User::where('role_id', 'staff_kemahasiswaan')->get();
        // Notification::send($staffs, new PengajuanNotifikasi($pengajuan, 'revisi_dikirim', true));

        return redirect()->route('mahasiswa.index')->with('success', 'Proses Upload Persuratan Berhasil !');
    }

    //Menyimpan template surat mou ke storage
    public function storeMou(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $currentYear = date('Y');
        $folderPath = 'app/PDF/Template_Surat_MOU';
        $publicPath = storage_path($folderPath);
        if (!Storage::makeDirectory($folderPath)) {
            return redirect()->back()->withErrors('Gagal membuat direktori untuk penyimpanan berkas.');
        }

        $filePath = $request->file('file')->move($publicPath,  $currentYear . '_TemplateSuratMOU.pdf') ? $currentYear . '_TemplateSuratMOU.pdf' : 'data gagal terupload';

        // $mahasiswas = User::where('role_id', 'mahasiswa')->get();
        // Notification::send($mahasiswas, new SKTerbitNotifikasi('sk_terbit'));

        return response()->json([
            'message' => 'File berhasil diunggah!',
            'path' => $filePath,
            'year' => $currentYear,
        ]);
    }

    //Menyimpan surat persyaratan pengajuan ke storage
    public function storePersyaratan(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $currentYear = date('Y');
        $folderPath = 'PDF/Persyaratan';
        $publicPath = storage_path("app/$folderPath");

        // Pastikan direktori ada
        Storage::disk('local')->makeDirectory($folderPath);

        // Simpan file
        $filePath = $request->file('file')->move($publicPath, $currentYear . '_PersyaratanPengajuan.pdf');

        return response()->json([
            'message' => 'File berhasil diunggah!',
            'path' => $filePath,
            'year' => $currentYear,
        ]);
    }

    // public function deleteSK(Request $request)
    // {
    //     $fileUrl = $request->fileUrl;

    //     // Dapatkan path file relatif terhadap public_path
    //     $relativePath = str_replace(asset(''), '', $fileUrl);

    //     // Path lengkap ke file
    //     $filePath = public_path($relativePath);

    //     // Hapus file jika ada
    //     if (File::exists($filePath)) {
    //         File::delete($filePath);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'File berhasil dihapus.'
    //         ]);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'File tidak ditemukan.'
    //     ], 404);
    // }
}
