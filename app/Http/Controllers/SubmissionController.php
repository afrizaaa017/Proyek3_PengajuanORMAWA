<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        // Definisikan variabel
        $pengajuan = new Pengajuan();
        $sudahMengajukan = $pengajuan->where('created_at','like','%2024%')->get()->count();
        $belumMengajukan = 35 - $sudahMengajukan;
        $profilAntrean = $pengajuan->whereIn('status',['sedang diproses', 'ditolak'])->latest()->get();
        $profilBerhasil = $pengajuan->where('status','diterima')->latest()->get();

        // Kirim data ke view menggunakan fungsi compact
        return view('dashboard', compact('sudahMengajukan', 'belumMengajukan', 'profilAntrean', 'profilBerhasil'));
    }
}
