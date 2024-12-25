<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Enums\PengajuanStatus;
use App\Models\KetuaOrmawa;
use App\Models\Timeline;  // Import model Timeline


class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data timeline dari database
        $timelines = Timeline::all(); 
        
        // Hitung total jumlah ORMAWA
        $totalOrmawa = KetuaOrmawa::count();
        
        // Hitung jumlah pengajuan dengan status "Diterima"
        $jumlahDiterima = Pengajuan::where('status', PengajuanStatus::Diterima->value)->count();
        
        // Hitung jumlah "Belum Disetujui"
        $jumlahBelumDisetujui = $totalOrmawa - $jumlahDiterima;
        
        // Kirim data 'timelines' ke view yang sesuai (misalnya 'admin')
        // Return view dengan data jumlah pengajuan
        return view('dashboardmahasiswa', compact('jumlahBelumDisetujui','timelines'));
    }
}
