<?php

namespace App\Http\Controllers;


use App\Models\Ormawa;
use App\Models\Jurusan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;

class FormController extends Controller
{
    public function simpanPengajuan(Request $request)
    {
        $request->session()->put('pengajuan', [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan'    => $request->jurusan,
            'prodi'     => $request->prodi,
            'ormawa'    => $request->ormawa,
            'ketua_ormawa' => $request->ketua_ormawa,
            'periode'    => $request->periode,
            'telp'    => $request->telp,
            'email'    => $request->email,


        ]);
        return redirect()->route('pengajuanberkas')->with('success', 'Data has been saved successfully.');
    }
    
    public function detailPengajuan()
    {
        $pengajuans = Pengajuan::with('berkas')->get();
        return view('detailPengajuan', compact('pengajuans'));
    }

    public function index()
    {
        $ormawas = Ormawa::all(); 
        $jurusans = Jurusan::all(); 

        return view('form', compact('ormawas', 'jurusans')); 
    }

    public function updateStatus($id, $status)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Validasi agar hanya menerima status yang valid
        if ($status === 'diterima' || $status === 'ditolak') {
            $pengajuan->status = PengajuanStatus::from($status);
            $pengajuan->save();
        }

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }

    public function progrestabel()
    {
        $pengajuans = Pengajuan::with('berkas')->get();
        return view('progrestabel', compact('pengajuans'));
    }

}
