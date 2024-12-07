<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    public function index()
    {
        if (!session()->has('pengajuan')) {
            return redirect()->route('form')->with('error', 'Harap lengkapi data biodata terlebih dahulu.');
        }
        $pengajuanData = session('pengajuan');
        return view('pengajuanberkas', ['pengajuanData' => $pengajuanData]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'scan_ktp' => 'required|mimes:pdf|max:2048',
            'surat_sehat' => 'required|mimes:pdf|max:2048',
            'surat_rekomendasi_jurusan' => 'required|mimes:pdf|max:2048',
            'transkip_rekomendasi_jurusan' => 'required|mimes:pdf|max:2048',
            'sertifikat_lkmm' => 'required|mimes:pdf|max:2048',
            'sertifikat_pelatihan_kepemimpinan' => 'required|mimes:pdf|max:2048',
            'sertifikat_pelatihan_emosional_spiritual' => 'required|mimes:pdf|max:2048',
            'sertifikat_bahasa_asing' => 'required|mimes:pdf|max:2048',
            'scan_ktm' => 'required|mimes:pdf|max:2048',
            'surat_keterangan_berkelakuan_baik' => 'required|mimes:pdf|max:2048',
            'surat_penyataan_mandiri' => 'required|mimes:pdf|max:2048',
            'sertifikat_pkkmb' => 'required|mimes:pdf|max:2048',
            'sertifikat_bela_negara' => 'required|mimes:pdf|max:2048',
            'sertifikat_agent_of_change' => 'required|mimes:pdf|max:2048',
            'sertifikat_berorganisasi' => 'required|mimes:pdf|max:2048',
            'berita_acara_pemilihan' => 'required|mimes:pdf|max:2048',
        ]);

        $pengajuanData = session('pengajuan');

        DB::transaction(function () use ($request, $pengajuanData) {
            $pengajuan = Pengajuan::create($pengajuanData);

            $berkas = new Berkas();
            $folderPath = 'laraview/' . $pengajuan->id;

            $publicPath = public_path($folderPath);

            Storage::makeDirectory($folderPath);
            $berkas->scan_ktp = $request->file('scan_ktp')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_scan_ktp.pdf') ? 'Pengaju_' . $pengajuan->id . '_scan_ktp.pdf' : 'data gagal terupload';
            $berkas->surat_sehat = $request->file('surat_sehat')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_surat_sehat.pdf') ? 'Pengaju_' . $pengajuan->id . '_surat_sehat.pdf' : 'data gagal terupload';
            $berkas->surat_rekomendasi_jurusan = $request->file('surat_rekomendasi_jurusan')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_surat_rekomendasi_jurusan.pdf') ? 'Pengaju_' . $pengajuan->id . '_surat_rekomendasi_jurusan.pdf' : 'data gagal terupload';
            $berkas->transkip_rekomendasi_jurusan = $request->file('transkip_rekomendasi_jurusan')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_transkip_rekomendasi_jurusan.pdf') ? 'Pengaju_' . $pengajuan->id . '_transkip_rekomendasi_jurusan.pdf' : 'data gagal terupload';
            $berkas->sertifikat_lkmm = $request->file('sertifikat_lkmm')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_lkmm.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_lkmm.pdf' : 'data gagal terupload';
            $berkas->sertifikat_pelatihan_kepemimpinan = $request->file('sertifikat_pelatihan_kepemimpinan')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_pelatihan_kepemimpinan.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_pelatihan_kepemimpinan.pdf' : 'data gagal terupload';
            $berkas->sertifikat_pelatihan_emosional_spiritual = $request->file('sertifikat_pelatihan_emosional_spiritual')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_pelatihan_emosional_spiritual.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_pelatihan_emosional_spiritual.pdf' : 'data gagal terupload';
            $berkas->sertifikat_bahasa_asing = $request->file('sertifikat_bahasa_asing')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_bahasa_asing.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_bahasa_asing.pdf' : 'data gagal terupload';
            $berkas->scan_ktm = $request->file('scan_ktm')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_scan_ktm.pdf') ? 'Pengaju_' . $pengajuan->id . '_scan_ktm.pdf' : 'data gagal terupload';
            $berkas->surat_keterangan_berkelakuan_baik = $request->file('surat_keterangan_berkelakuan_baik')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_surat_keterangan_berkelakuan_baik.pdf') ? 'Pengaju_' . $pengajuan->id . '_surat_keterangan_berkelakuan_baik.pdf' : 'data gagal terupload';
            $berkas->surat_penyataan_mandiri = $request->file('surat_penyataan_mandiri')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_surat_penyataan_mandiri.pdf') ? 'Pengaju_' . $pengajuan->id . '_surat_penyataan_mandiri.pdf' : 'data gagal terupload';
            $berkas->sertifikat_pkkmb = $request->file('sertifikat_pkkmb')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_pkkmb.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_pkkmb.pdf' : 'data gagal terupload';
            $berkas->sertifikat_bela_negara = $request->file('sertifikat_bela_negara')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_bela_negara.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_bela_negara.pdf' : 'data gagal terupload';
            $berkas->sertifikat_agent_of_change = $request->file('sertifikat_agent_of_change')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_agent_of_change.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_agent_of_change.pdf' : 'data gagal terupload';
            $berkas->sertifikat_berorganisasi = $request->file('sertifikat_berorganisasi')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_sertifikat_berorganisasi.pdf') ? 'Pengaju_' . $pengajuan->id . '_sertifikat_berorganisasi.pdf' : 'data gagal terupload';
            $berkas->berita_acara_pemilihan = $request->file('berita_acara_pemilihan')->move($publicPath, 'Pengaju_' . $pengajuan->id . '_berita_acara_pemilihan.pdf') ? 'Pengaju_' . $pengajuan->id . '_berita_acara_pemilihan.pdf' : 'data gagal terupload';

            $request->session()->put('berkas', [
                'scan_ktp' => Auth::id()
            ]);

            $berkas->pengajuan_id = $pengajuan->id;
            $pengajuan->status = PengajuanStatus::SedangDiproses;
            $berkas->save();
        });

        $request->session()->forget('pengajuan');
        return redirect('/progrestabel')->with('success', 'Pengajuan dan berkas berhasil disimpan.');
    }

    public function progrestabel(Request $request)
    {
        $userId = Auth::id();
        $exists = Pengajuan::where('user_id', $userId)->exists();

        if (!session()->has('berkas') && !$exists) {
            return redirect()->route('pengajuanberkas')->with('error', 'Harap lengkapi data biodata terlebih dahulu.');
        }

        $request->session()->forget('berkas');
        $pengajuans = Pengajuan::with('berkas')->where('user_id', Auth::id())->get();
 
        return view('progrestabel', compact('pengajuans'));
    }

    public function edit($id)
    {
        $revisiPengajuan = session('revisiPengajuan');
        $pengajuans = Pengajuan::with('berkas')->find($id);
        return view('editPengajuBerkas', ['pengajuans' => $pengajuans, 'revisiPengajuan' => $revisiPengajuan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'scan_ktp' => 'nullable|file|mimes:pdf|max:2048',
            'surat_sehat' => 'nullable|file|mimes:pdf|max:2048',
            'surat_rekomendasi_jurusan' => 'nullable|file|mimes:pdf|max:2048',
            'transkip_rekomendasi_jurusan' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_lkmm' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_pelatihan_kepemimpinan' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_pelatihan_emosional_spiritual' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_bahasa_asing' => 'nullable|file|mimes:pdf|max:2048',
            'scan_ktm' => 'nullable|file|mimes:pdf|max:2048',
            'surat_keterangan_berkelakuan_baik' => 'nullable|file|mimes:pdf|max:2048',
            'surat_penyataan_mandiri' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_pkkmb' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_bela_negara' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_agent_of_change' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_berorganisasi' => 'nullable|file|mimes:pdf|max:2048',
            'berita_acara_pemilihan' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $revisiPengajuan = session('revisiPengajuan');

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = PengajuanStatus::SedangDiproses;
        $pengajuan->update($revisiPengajuan);

        $berkas = $pengajuan->berkas;


        $folderPath = 'laraview/' . $berkas->id;

        $publicPath = public_path($folderPath);

        Storage::makeDirectory($folderPath);
        if ($request->hasFile('scan_ktp')) {
            $berkas->scan_ktp = $request->file('scan_ktp')->move($publicPath, 'Pengaju_' . $berkas->id . '_scan_ktp.pdf') ? 'Pengaju_' . $berkas->id . '_scan_ktp.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('surat_sehat')) {
            $berkas->surat_sehat = $request->file('surat_sehat')->move($publicPath, 'Pengaju_' . $berkas->id . '_surat_sehat.pdf') ? 'Pengaju_' . $berkas->id . '_surat_sehat.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('surat_rekomendasi_jurusan')) {
            $berkas->surat_rekomendasi_jurusan = $request->file('surat_rekomendasi_jurusan')->move($publicPath, 'Pengaju_' . $berkas->id . '_surat_rekomendasi_jurusan.pdf') ? 'Pengaju_' . $berkas->id . '_surat_rekomendasi_jurusan.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('transkip_rekomendasi_jurusan')) {
            $berkas->transkip_rekomendasi_jurusan = $request->file('transkip_rekomendasi_jurusan')->move($publicPath, 'Pengaju_' . $berkas->id . '_transkip_rekomendasi_jurusan.pdf') ? 'Pengaju_' . $berkas->id . '_transkip_rekomendasi_jurusan.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_lkmm')) {
            $berkas->sertifikat_lkmm = $request->file('sertifikat_lkmm')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_lkmm.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_lkmm.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_pelatihan_kepemimpinan')) {
            $berkas->sertifikat_pelatihan_kepemimpinan = $request->file('sertifikat_pelatihan_kepemimpinan')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_pelatihan_kepemimpinan.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_pelatihan_kepemimpinan.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_pelatihan_emosional_spiritual')) {
            $berkas->sertifikat_pelatihan_emosional_spiritual = $request->file('sertifikat_pelatihan_emosional_spiritual')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_pelatihan_emosional_spiritual.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_pelatihan_emosional_spiritual.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_bahasa_asing')) {
            $berkas->sertifikat_bahasa_asing = $request->file('sertifikat_bahasa_asing')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_bahasa_asing.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_bahasa_asing.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('scan_ktm')) {
            $berkas->scan_ktm = $request->file('scan_ktm')->move($publicPath, 'Pengaju_' . $berkas->id . '_scan_ktm.pdf') ? 'Pengaju_' . $berkas->id . '_scan_ktm.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('surat_keterangan_berkelakuan_baik')) {
            $berkas->surat_keterangan_berkelakuan_baik = $request->file('surat_keterangan_berkelakuan_baik')->move($publicPath, 'Pengaju_' . $berkas->id . '_surat_keterangan_berkelakuan_baik.pdf') ? 'Pengaju_' . $berkas->id . '_surat_keterangan_berkelakuan_baik.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('surat_penyataan_mandiri')) {
            $berkas->surat_penyataan_mandiri = $request->file('surat_penyataan_mandiri')->move($publicPath, 'Pengaju_' . $berkas->id . '_surat_penyataan_mandiri.pdf') ? 'Pengaju_' . $berkas->id . '_surat_penyataan_mandiri.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_pkkmb')) {
            $berkas->sertifikat_pkkmb = $request->file('sertifikat_pkkmb')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_pkkmb.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_pkkmb.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_bela_negara')) {
            $berkas->sertifikat_bela_negara = $request->file('sertifikat_bela_negara')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_bela_negara.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_bela_negara.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_agent_of_change')) {
            $berkas->sertifikat_agent_of_change = $request->file('sertifikat_agent_of_change')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_agent_of_change.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_agent_of_change.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('sertifikat_berorganisasi')) {
            $berkas->sertifikat_berorganisasi = $request->file('sertifikat_berorganisasi')->move($publicPath, 'Pengaju_' . $berkas->id . '_sertifikat_berorganisasi.pdf') ? 'Pengaju_' . $berkas->id . '_sertifikat_berorganisasi.pdf' : 'data gagal terupload';
        }
        if ($request->hasFile('berita_acara_pemilihan')) {
            $berkas->berita_acara_pemilihan = $request->file('berita_acara_pemilihan')->move($publicPath, 'Pengaju_' . $berkas->id . '_berita_acara_pemilihan.pdf') ? 'Pengaju_' . $berkas->id . '_berita_acara_pemilihan.pdf' : 'data gagal terupload';
        }

        $berkas->save();

        return redirect()->route('progrestabel')->with('success', 'Data updated successfully');
    }

    public function uploadSK(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048', 
        ]);
        
        $currentYear = date('Y');
        $folderPath = 'laraview/SK';
        $publicPath = public_path($folderPath);
        Storage::makeDirectory($folderPath);

        $filePath = $request->file('file')->move($publicPath,  $currentYear . '_SK.pdf') ? $currentYear . '_SK.pdf' : 'data gagal terupload';

        return response()->json([
            'message' => 'File berhasil diunggah!',
            'path' => $filePath,
            'year' => $currentYear,
        ]);
    }

    public function deleteSK(Request $request)
    {
        $fileUrl = $request->fileUrl;

        // Dapatkan path file relatif terhadap public_path
        $relativePath = str_replace(asset(''), '', $fileUrl);

        // Path lengkap ke file
        $filePath = public_path($relativePath);

        // Hapus file jika ada
        if (File::exists($filePath)) {
            File::delete($filePath);

            return response()->json([
                'success' => true,
                'message' => 'File berhasil dihapus.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'File tidak ditemukan.'
        ], 404);
    }
}
