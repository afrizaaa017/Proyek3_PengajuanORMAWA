<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    //Mengambil data prodi dari database
    public function getProdi($jurusan_id)
    {
        $prodis = Prodi::where('jurusan_id', $jurusan_id)->get();
        return response()->json($prodis);
    }

    //Menampilkan daftar semua prodi dan jurusan
    public function indexProdiJurusan()
    {
        $prodis = Prodi::with('jurusan')->get();
        $jurusans = Jurusan::all();
        return view('Pages.Kemahasiswaan.kelola_jurusan', compact('prodis', 'jurusans'));
    }

    // Menyimpan data prodi baru ke database
    public function storeProdi(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|string|unique:prodis|max:255',
            'jurusan_id' => 'required|exists:jurusans,id_jurusan'
        ]);

        Prodi::create([
            'nama_prodi' => $request->nama_prodi,
            'jurusan_id' => $request->jurusan_id
        ]);

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan');
    }

    //Menghapus data prodi tertentu dari database
    public function destroyProdi($id)
    {
        $prodis = Prodi::findOrFail($id);
        $prodis->delete();

        return redirect()->route('prodi.index')->with('success', 'Ketua Ormawa berhasil dihapus');
    }
}
