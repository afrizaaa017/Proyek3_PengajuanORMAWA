<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        // Tentukan periode saat ini berdasarkan tanggal
        $currentYear = date('Y');
        $currentMonth = date('n');
        $defaultPeriode = $currentMonth >= 11 ? "$currentYear-" . ($currentYear + 1) : ($currentYear - 1) . "-$currentYear";

        // Ambil periode dari query string atau gunakan default periode
        $periode = $request->input('periode', $defaultPeriode);

        // Filter data berdasarkan periode
        $pengajuan = new Pengajuan();
        $sudahMengajukan = $pengajuan->where('periode', $periode)->count();
        $belumMengajukan = 35 - $sudahMengajukan;
        $profilAntrean = $pengajuan->where('periode', $periode)
            ->whereIn('status', ['Menunggu Verifikasi', 'Perlu Revisi'])
            ->latest()
            ->get();
        $profilBerhasil = $pengajuan->where('periode', $periode)
            ->where('status', 'Diterima')
            ->latest()
            ->get();

        // Ambil daftar periode unik untuk dropdown filter
        $periodes = $pengajuan->select('periode')->distinct()->pluck('periode');

        // Kirim data ke view menggunakan fungsi compact
        return view('dashboard', compact('sudahMengajukan', 'belumMengajukan', 'profilAntrean', 'profilBerhasil', 'periode', 'periodes'));
    }
}
