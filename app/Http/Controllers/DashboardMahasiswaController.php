<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajuan;
use App\Models\KetuaOrmawa;
use App\Enums\PengajuanStatus;
use App\Models\Timeline;  // Import model Timeline

class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data timeline dari database
        $timelines = Timeline::all();

        // Hitung total jumlah ORMAWA
        $totalOrmawa = KetuaOrmawa::count();

        // Hitung jumlah Ormawa yang sudah mengajukan pengajuan
        $jumlahDiterima = Pengajuan::where('status', PengajuanStatus::Diterima->value)->count();

        // Hitung jumlah Ormawa yang pengajuannya belum disetujui
        // $jumlahBelumDisetujui = Pengajuan::whereIn('status', [
        //     PengajuanStatus::MenungguVerifikasi->value,
        //     PengajuanStatus::PerluRevisi->value,
        //     PengajuanStatus::MenungguVerifikasiUlang->value
        // ])->count();

        // Ambil data Ormawa yang belum mengajukan pengajuan
        $ormawaBelumMengajukan = DB::table('ketua_ormawa')
            ->leftJoin('pengajuans', 'ketua_ormawa.nama_ketua', '=', 'pengajuans.ketua_ormawa')
            ->whereNull('pengajuans.id') // Hanya ambil Ormawa yang belum ada pengajuannya
            ->get();

        // Ambil data pengajuan yang belum disetujui
        $pengajuanBelumDisetujui = Pengajuan::whereIn('status', [
            PengajuanStatus::MenungguVerifikasi->value,
            PengajuanStatus::PerluRevisi->value,
            PengajuanStatus::MenungguVerifikasiUlang->value,
        ])->get();

        // Gabungkan data Ormawa yang belum mengajukan dan pengajuan yang belum disetujui
        $allOrmawaBelumDisetujui = $ormawaBelumMengajukan->merge($pengajuanBelumDisetujui);

        // Kirim data ke view
        return view('dashboardmahasiswa', [
            'jumlahBelumDisetujui' =>  $totalOrmawa - Pengajuan::where('status', PengajuanStatus::Diterima->value)->count(),
            'allOrmawaBelumDisetujui' => $allOrmawaBelumDisetujui,  // Data Ormawa yang belum disetujui atau belum mengajukan
            'timelines' => $timelines,
        ]);
    }
}