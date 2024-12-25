<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Enums\PengajuanStatus;
use App\Models\KetuaOrmawa;


class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        // Hitung total jumlah ORMAWA
        $totalOrmawa = KetuaOrmawa::count();

        // Hitung jumlah pengajuan dengan status "Diterima"
        $jumlahDiterima = Pengajuan::where('status', PengajuanStatus::Diterima->value)->count();

        // Hitung jumlah "Belum Disetujui"
        $jumlahBelumDisetujui = $totalOrmawa - $jumlahDiterima;

        // Return view dengan data jumlah pengajuan
        return view('dashboardmahasiswa', compact('jumlahBelumDisetujui'));
    }
}
