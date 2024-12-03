<?php

namespace App\Http\Controllers;


use App\Status;
use App\Models\Prodi;
use App\Models\Ormawa;
use App\Models\Jurusan;
use App\Models\Pengajuan;
use App\Models\KetuaOrmawa;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    
    public function simpanPengajuan(Request $request)
    {
        if (session()->has('pengajuan')) {
            return redirect()->route('pengajuanberkas')->with('success', 'Harap lengkapi data biodata terlebih dahulu.');
        }

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
    
    public function detailPengajuan($id)
    {
        // Ambil data pengajuan berdasarkan id beserta relasi 'berkas'
        $pengajuans = Pengajuan::with('berkas')->find($id);

        // Jika data tidak ditemukan, kembalikan pesan error
        if (!$pengajuans) {
            return redirect()->back()->with('error', 'Data pengajuan tidak ditemukan.');
        }

        // Kirimkan data ke view
        return view('detailPengajuan', compact('pengajuans'));
    }

    public function index()
    {
        $ormawas = Ormawa::all(); 
        $jurusans = Jurusan::all(); 
        $prodis = Prodi::all(); 
        $ketuaOrmawas = KetuaOrmawa::all(); 
    
        return view('form', compact('ormawas', 'jurusans', 'prodis', 'ketuaOrmawas')); 
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $status;

        if ($status === 'Diterima') {
            $pengajuan->keterangan = 'Tidak ada revisi';
        } else if ($status === 'Ditolak') {
            $request->validate([
                'revisi' => 'required|string',
            ]);
            $pengajuan->keterangan = $request->input('revisi');
        }
        else{
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $pengajuan->save();

        return redirect('/listtable')->with('success', 'Status pengajuan berhasil diperbarui.');
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

    public function listtable(Request $request)
    {
        // Ambil nilai periode yang dipilih dari query string
        $selectedPeriode = $request->input('periode');

        // Ambil daftar periode unik dari database untuk dropdown
        $periodes = Pengajuan::select('periode')->distinct()->pluck('periode');

        // Ambil data pengajuan, filter berdasarkan periode jika ada
        $pengajuans = Pengajuan::when($selectedPeriode, function ($query) use ($selectedPeriode) {
            return $query->where('periode', $selectedPeriode);
        })->get();

        // Kirim data ke view
        return view('listtable', compact('pengajuans', 'periodes', 'selectedPeriode'));
    }
}

