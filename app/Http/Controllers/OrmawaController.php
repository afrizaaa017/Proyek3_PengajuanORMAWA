<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;

class OrmawaController extends Controller
{
    public function index()
    {
        // Hitung jumlah ORMAWA berdasarkan status
        $totalOrmawa = Ormawa::count(); // Total ORMAWA di Polban
        $submittedOrmawa = Ormawa::where('status', 'submitted')->count(); // ORMAWA yang sudah mengajukan tapi belum disetujui
        $approvedOrmawa = Ormawa::where('status', 'approved')->count(); // ORMAWA yang sudah disetujui

        // Hitung yang belum disetujui (total dikurangi yang sudah disetujui)
        $notApprovedOrmawa = $totalOrmawa - $approvedOrmawa;

        return view('dashboard-mahasiswa', compact('notApprovedOrmawa', 'totalOrmawa', 'approvedOrmawa'));
    }
}
