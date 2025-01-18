<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Notifications\PengajuanNotifikasi;

class PengajuanController extends Controller
{
    //Menampilkan semua list pengajuan
    public function indexListPengajuan(Request $request)
    {
        $selectedPeriode = $request->input('periode');

        $periodes = Pengajuan::select('periode')->distinct()->pluck('periode');

        $pengajuans = Pengajuan::when($selectedPeriode, function ($query) use ($selectedPeriode) {
            return $query->where('periode', $selectedPeriode);
        })->get();

        return view('Pages.Kemahasiswaan.list_tabel', compact('pengajuans', 'periodes', 'selectedPeriode'));
    }

    //Menampilkan detail pengajuan tertentu berdasarkan id
    public function showDetailPengajuan($id)
    {
        $pengajuans = Pengajuan::with('berkas')->find($id);

        if (!$pengajuans) {
            return redirect()->back()->with('error', 'Data pengajuan tidak ditemukan.');
        }

        $files = [
            '1. Scan KTP' => $pengajuans->berkas->scan_ktp,
            '2. Surat Sehat' => $pengajuans->berkas->surat_sehat,
            '3. Surat Rekomendasi Jurusan' => $pengajuans->berkas->surat_rekomendasi_jurusan,
            '4. Transkip Akademik Semester Terakhir(IPK)' => $pengajuans->berkas->transkip_rekomendasi_jurusan,
            '5. Sertifikat LKMM' => $pengajuans->berkas->sertifikat_lkmm,
            '6. Sertifikat Pelatihan Kepemimpinan' => $pengajuans->berkas->sertifikat_pelatihan_kepemimpinan,
            '7. Sertifikat Pelatihan Emosional' => $pengajuans->berkas->sertifikat_pelatihan_emosional_spiritual,
            '8. Sertifikat Bahasa Asing (EPT)' => $pengajuans->berkas->sertifikat_bahasa_asing,
            '9. Scan KTM' => $pengajuans->berkas->scan_ktm,
            '10. Surat Keterangan Berkelakuan Baik' => $pengajuans->berkas->surat_keterangan_berkelakuan_baik,
            '11. Surat Pernyataan Mandiri' => $pengajuans->berkas->surat_penyataan_mandiri,
            '12. Sertifikat PKKMB' => $pengajuans->berkas->sertifikat_pkkmb,
            '13. Sertifikat Bela Negara' => $pengajuans->berkas->sertifikat_bela_negara,
            '14. Sertifikat Agent of Change' => $pengajuans->berkas->sertifikat_agent_of_change,
            '15. Sertifikat Berorganisasi' => $pengajuans->berkas->sertifikat_berorganisasi,
            '16. Berita Acara Pemilihan' => $pengajuans->berkas->berita_acara_pemilihan,
        ];
        return view('Pages.Kemahasiswaan.detail_pengajuan', compact('pengajuans', 'files'));
    }

    //Memperbarui status pengajuan tertentu setelah dilakukan verifikasi
    public function updateStatusPengajuan(Request $request, $id, $status)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $status;

        if ($status === 'Diterima') {
            $pengajuan->keterangan = 'Tidak ada revisi';

            $pengajuan->save();
            return redirect()->route('list.pengajuan.index')->with('successDiterima', "Status pengajuan dengan No Pengajuan {$pengajuan->id} berhasil diperbarui.");
        } else if ($status === 'Perlu Revisi') {
            $request->validate([
                'revisi' => 'required|string',
            ]);
            $pengajuan->keterangan = $request->input('revisi');

            $pengajuan->save();
            $user = User::find($pengajuan->user_id);
            $user->notify(new PengajuanNotifikasi($pengajuan, 'revisi', false));
            return redirect()->route('list.pengajuan.index')->with('successRevisi', "Status pengajuan dengan No Pengajuan {$pengajuan->id} berhasil diperbarui.");
        } else {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }
    }

    //Menampilkan detail surat tertentu bedasarkan id
    public function showDetailSurat($id)
    {
        $pengajuans = Pengajuan::with('berkas')->find($id);

        if (!$pengajuans) {
            return redirect()->back()->with('error', 'Data pengajuan tidak ditemukan.');
        }

        $files = [
            '1. Surat Pernyataan' => $pengajuans->berkas->surat_pernyataan,
            '2. Surat Perjanjian' => $pengajuans->berkas->surat_perjanjian,
            '3. Surat MoU' => $pengajuans->berkas->surat_mou,
            '4. Surat KAK' => $pengajuans->berkas->surat_kak,
        ];

        return view('Pages.Kemahasiswaan.detail_surat_pendukung', compact('pengajuans', 'files'));
    }
}
