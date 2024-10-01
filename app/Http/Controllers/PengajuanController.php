<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function pengajuanHimpunan()
    {
        return view('pengajuanhimpunan', [       
        ]);
        
    }

    public function pengajuanUKM()
    {
        return view('pengajuanukm', [       
        ]);
        
    }

    public function pengajuanPusat()
    {
        return view('pengajuanpusat', [       
        ]);
        
    }

    public function simpanPengajuan(Request $request)
    {
        Pengajuan::create([
            
            'nama'      => $request->nama,
            'nim'    => $request->nim,
            'jurusan'    => $request->jurusan,
            'prodi'     => $request->prodi,
            'ormawa'    => $request->ormawa,
            'periode'    => $request->periode,
            'telp'    => $request->telp,
            'email'    => $request->email,
        ]);

        return redirect('/pengajuanberkas');
    }

    public function detailPengajuan()
    {
        $pengajuans = Pengajuan::all();
        return view('detailPengajuan', compact('pengajuans'));
    }




}
