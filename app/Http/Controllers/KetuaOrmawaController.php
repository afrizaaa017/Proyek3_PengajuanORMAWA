<?php

namespace App\Http\Controllers;
use App\Models\Ormawa;
use App\Models\KetuaOrmawa;
use Illuminate\Http\Request;

class KetuaOrmawaController extends Controller
{
    //Mengambil data ketua ormawa dari database
    public function getKetuaOrmawa($ormawa_id)
    {
        $ketuaOrmawa = KetuaOrmawa::where('ormawa_id', $ormawa_id)->get();
        return response()->json($ketuaOrmawa);
    }

    //Menampilkan daftar semua ormawa dan jenis ormawa
    public function indexOrmawa()
    {
        $ketuaOrmawas = KetuaOrmawa::with('ormawa')->get();
        $ormawas = Ormawa::all(); 
        return view('Pages.Kemahasiswaan.kelola_ketua_ormawa', compact('ketuaOrmawas','ormawas'));
    }

    // Menyimpan data ketua ormawa baru ke database
    public function storeOrmawa(Request $request)
    {
        $request->validate([
            'nama_ketua' => 'required|string|unique:ketua_ormawa|max:255',
            'ormawa_id' => 'required|exists:ormawa,id_ormawa'
        ]);

        KetuaOrmawa::create([
            'nama_ketua' => $request->nama_ketua,
            'ormawa_id' => $request->ormawa_id
        ]);

        return redirect()->route('ketuaOrmawa.index')->with('success', 'Ketua Ormawa berhasil ditambahkan');
    }

    // Menghapus data ormawa tertentu dari database
    public function destroyOrmawa($id)
    {
        $ketuaOrmawa = KetuaOrmawa::findOrFail($id);
        $ketuaOrmawa->delete();

        return redirect()->route('ketuaOrmawa.index')->with('success', 'Ketua Ormawa berhasil dihapus');
    }
    
}
