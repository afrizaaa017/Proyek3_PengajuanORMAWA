<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    //Menampilkan progress pengajuan tertentu berdasarkan auth id
    public function showProgress(Request $request)
    {
        $userId = Auth::id();
        $exists = Pengajuan::where('user_id', $userId)->exists();

        if (!session()->has('berkas') && !$exists) {
            return redirect()->route('pengajuan.berkas.create')->with('error', 'Harap lengkapi data biodata terlebih dahulu.');
        }

        $request->session()->forget('berkas');
        $pengajuans = Pengajuan::with('berkas')->where('user_id', Auth::id())->get();
        return view('Pages.Mahasiswa.progress_tabel', compact('pengajuans'));
    }
}
