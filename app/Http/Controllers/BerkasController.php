<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    public function index()
    {
        return view('pengajuanberkas');
    }

    // Method untuk menyimpan file
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'scan_ktp' => 'required|mimes:pdf|max:2048', // Hanya menerima file PDF
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

        // Simpan file ke storage
        if ($request->file('scan_ktp')) {
            
            // Simpan path dan nama file ke database
            $berkas = new Berkas(); // Gunakan model Berkas
            $berkas->scan_ktp = $request->file('scan_ktp')->getClientOriginalName(); // Simpan nama asli file
            $berkas->surat_sehat = $request->file('surat_sehat')->getClientOriginalName(); 
            $berkas->surat_rekomendasi_jurusan = $request->file('surat_rekomendasi_jurusan')->getClientOriginalName(); 
            $berkas->transkip_rekomendasi_jurusan = $request->file('transkip_rekomendasi_jurusan')->getClientOriginalName(); 
            $berkas->sertifikat_lkmm = $request->file('sertifikat_lkmm')->getClientOriginalName(); 
            $berkas->sertifikat_pelatihan_kepemimpinan = $request->file('sertifikat_pelatihan_kepemimpinan')->getClientOriginalName(); 
            $berkas->sertifikat_pelatihan_emosional_spiritual = $request->file('sertifikat_pelatihan_emosional_spiritual')->getClientOriginalName(); 
            $berkas->sertifikat_bahasa_asing = $request->file('sertifikat_bahasa_asing')->getClientOriginalName(); 
            $berkas->scan_ktm = $request->file('scan_ktm')->getClientOriginalName(); 
            $berkas->surat_keterangan_berkelakuan_baik = $request->file('surat_keterangan_berkelakuan_baik')->getClientOriginalName(); 
            $berkas->surat_penyataan_mandiri = $request->file('surat_penyataan_mandiri')->getClientOriginalName(); 
            $berkas->sertifikat_pkkmb = $request->file('sertifikat_pkkmb')->getClientOriginalName(); 
            $berkas->sertifikat_bela_negara = $request->file('sertifikat_bela_negara')->getClientOriginalName(); 
            $berkas->sertifikat_agent_of_change = $request->file('sertifikat_agent_of_change')->getClientOriginalName(); 
            $berkas->sertifikat_berorganisasi = $request->file('sertifikat_berorganisasi')->getClientOriginalName(); 
            $berkas->berita_acara_pemilihan = $request->file('berita_acara_pemilihan')->getClientOriginalName(); 
            $berkas->save(); // Simpan ke database
        }
        return redirect('/progrestabel');
        return back()->with('success', 'File berhasil diupload dan disimpan ke database.');
        
    }

    // Method untuk menampilkan file yang di-upload
    public function read()
    {
        $pengajuans = Pengajuan::all(); // Mengambil semua data file dari database
        return view('detailPengajuan', compact('pengajuans'));
    }
}
