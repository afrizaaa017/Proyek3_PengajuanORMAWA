<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // Menyimpan data jurusan baru ke database
    public function storeJurusan(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|unique:jurusans|max:255',
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan');
    }

    //Menghapus data jurusan tertentu dari database
    public function destroyJurusan($id)
    {
        $jurusans = Jurusan::findOrFail($id);
        $jurusans->delete();

        return redirect()->route('prodi.index')->with('success', 'Ketua Ormawa berhasil dihapus');
    }
}
