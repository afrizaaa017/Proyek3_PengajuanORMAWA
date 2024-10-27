<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all(); // Ambil semua data Jurusan
        return view('dropdown', compact('jurusans'));
    }

    public function getProdi($jurusan_id)
    {
        $prodis = Prodi::where('jurusan_id', $jurusan_id)->get(); // Ambil Prodi berdasarkan jurusan_id
        return response()->json($prodis);
    }
}
