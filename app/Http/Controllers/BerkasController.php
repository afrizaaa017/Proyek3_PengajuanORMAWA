<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;
use App\Notifications\Notifs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    public function index()
    {
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

            // Tentukan path lengkap dalam folder public
            $publicPath = public_path($folderPath);

            Storage::makeDirectory($folderPath);
            $berkas->scan_ktp = $request->file('scan_ktp')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_scan_ktp.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_scan_ktp.pdf' : 'data gagal terupload';
            $berkas->surat_sehat = $request->file('surat_sehat')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_surat_sehat.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_surat_sehat.pdf' : 'data gagal terupload';
            $berkas->surat_rekomendasi_jurusan = $request->file('surat_rekomendasi_jurusan')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_surat_rekomendasi_jurusan.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_surat_rekomendasi_jurusan.pdf' : 'data gagal terupload';
            $berkas->transkip_rekomendasi_jurusan = $request->file('transkip_rekomendasi_jurusan')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_transkip_rekomendasi_jurusan.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_transkip_rekomendasi_jurusan.pdf' : 'data gagal terupload';
            $berkas->sertifikat_lkmm = $request->file('sertifikat_lkmm')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_lkmm.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_lkmm.pdf' : 'data gagal terupload';
            $berkas->sertifikat_pelatihan_kepemimpinan = $request->file('sertifikat_pelatihan_kepemimpinan')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_pelatihan_kepemimpinan.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_pelatihan_kepemimpinan.pdf' : 'data gagal terupload';
            $berkas->sertifikat_pelatihan_emosional_spiritual = $request->file('sertifikat_pelatihan_emosional_spiritual')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_pelatihan_emosional_spiritual.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_pelatihan_emosional_spiritual.pdf' : 'data gagal terupload';
            $berkas->sertifikat_bahasa_asing = $request->file('sertifikat_bahasa_asing')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_bahasa_asing.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_bahasa_asing.pdf' : 'data gagal terupload';
            $berkas->scan_ktm = $request->file('scan_ktm')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_scan_ktm.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_scan_ktm.pdf' : 'data gagal terupload';
            $berkas->surat_keterangan_berkelakuan_baik = $request->file('surat_keterangan_berkelakuan_baik')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_surat_keterangan_berkelakuan_baik.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_surat_keterangan_berkelakuan_baik.pdf' : 'data gagal terupload';
            $berkas->surat_penyataan_mandiri = $request->file('surat_penyataan_mandiri')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_surat_penyataan_mandiri.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_surat_penyataan_mandiri.pdf' : 'data gagal terupload';
            $berkas->sertifikat_pkkmb = $request->file('sertifikat_pkkmb')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_pkkmb.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_pkkmb.pdf' : 'data gagal terupload';
            $berkas->sertifikat_bela_negara = $request->file('sertifikat_bela_negara')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_bela_negara.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_bela_negara.pdf' : 'data gagal terupload';
            $berkas->sertifikat_agent_of_change = $request->file('sertifikat_agent_of_change')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_agent_of_change.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_agent_of_change.pdf' : 'data gagal terupload';
            $berkas->sertifikat_berorganisasi = $request->file('sertifikat_berorganisasi')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_berorganisasi.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_sertifikat_berorganisasi.pdf' : 'data gagal terupload';
            $berkas->berita_acara_pemilihan = $request->file('berita_acara_pemilihan')->move($publicPath, $pengajuan->nim . '_' . $pengajuan->nama . '_berita_acara_pemilihan.pdf') ? $pengajuan->nim . '_' . $pengajuan->nama . '_berita_acara_pemilihan.pdf' : 'data gagal terupload';

            $berkas->pengajuan_id = $pengajuan->id;
            $pengajuan->status = PengajuanStatus::SedangDiproses;
            $pengajuan->isDiterima = $pengajuan->status === PengajuanStatus::Diterima;
            $berkas->save();

            $pengajuan->notify(new Notifs($pengajuan->toArray()));
        });

        $request->session()->forget('pengajuan');
        return redirect('/progrestabel')->with('success', 'Pengajuan dan berkas berhasil disimpan.');
    }
}
