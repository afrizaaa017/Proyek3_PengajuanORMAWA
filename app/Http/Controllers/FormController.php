<?php 

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Jurusan;
use App\Models\Prodi;

class FormController extends Controller
{

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
    public function index()
    {
        $ormawas = Ormawa::all(); // Ambil semua data Ormawa
        $jurusans = Jurusan::all(); // Ambil semua data Jurusan
    
        return view('form', compact('ormawas', 'jurusans')); // Pass both data to view
    }
    
    public function getProdi($jurusan_id)
    {
        $prodis = Prodi::where('jurusan_id', $jurusan_id)->get(); // Ambil Prodi berdasarkan jurusan_id
        return response()->json($prodis);
    }
}


