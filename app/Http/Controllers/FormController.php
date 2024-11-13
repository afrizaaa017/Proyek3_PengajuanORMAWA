<?php

namespace App\Http\Controllers;


use App\Models\KetuaOrmawa;
use App\Models\Ormawa;
use App\Models\Jurusan;
use App\Models\Pengajuan;
use App\Models\Prodi;
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
        $prodis = Prodi::all(); 
        $ketuaOrmawas = KetuaOrmawa::all(); 

        return view('form', compact('ormawas', 'jurusans','prodis','ketuaOrmawas')); 
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $pengajuan = Pengajuan::findOrFail($id);
    
        // Validasi input
        $request->validate([
            'revisi' => 'required|string',
        ]);
    
        // Ubah status jika sesuai
        if (in_array($status, ['diterima', 'ditolak'])) {
            $pengajuan->status = $status;
        }
    
        // Simpan keterangan dari revisi
        $pengajuan->keterangan = $request->input('revisi');
        $pengajuan->save();
    
        return redirect('/detailPengajuans')->with('success', 'Revisi berhasil diperbarui');
    }
    

    // public function edit($id)
    // {
    //     // Find the existing record by ID
    //     $revisi = Pengajuan::findOrFail($id);
    
    //     // Return the edit view with the record data
    //     return view('detailPengajuan.edit', compact('revisi'));
    // }
    
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'revisi' => 'required',
    //     ]);
    
    //     $revisi = Pengajuan::findOrFail($id);
    //     $revisi->revisi = $request->input('revisi');
    //     $revisi->save();
    
    //     return redirect('/detailPengajuans')->with('success', 'Revisi berhasil diperbarui');
    // }
    

    public function progrestabel()
    {
        $pengajuans = Pengajuan::with('berkas')->get();
        return view('progrestabel', compact('pengajuans'));
    }

}
