<?php 

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\Himpunan;
use App\Models\UKM;
use App\Models\BemMpm;
use App\Models\ketua_ormawa;

class FormController extends Controller
{
    public function simpanPengajuan(Request $request)
    {
            // Validate your request data
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'ormawa' => 'required',
            'ketua_ormawa' => 'required', // Ensure this is required
            'periode' => 'required',
            'telp' => 'required',
            'email' => 'required|email',
        ]);

        // Insert the data into the database
        Pengajuan::create($validatedData);
    // Redirect or return response

        // Create the Pengajuan entry
        Pengajuan::create([
            'nama'          => $request->nama,
            'nim'           => $request->nim,
            'jurusan'       => $request->jurusan,
            'prodi'         => $request->prodi,
            'ormawa'        => $request->ormawa,
            'ketua_ormawa'  => $request->KetuaOrmawa, // Ensure this matches the database column
            'periode'       => $request->periode,
            'telp'          => $request->telp,
            'email'         => $request->email,
        ]);

        return redirect('/pengajuanberkas')->with('success', 'Pengajuan berhasil disimpan!');
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

    public function getKetuaOrmawa($ormawa_id)
    {
        $ketuaOrmawa = ketua_ormawa::where('ormawa_id', $ormawa_id)->get();
        return response()->json($ketuaOrmawa);
    }
}
