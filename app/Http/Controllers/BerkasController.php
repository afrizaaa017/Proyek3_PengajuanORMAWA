<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    // Method untuk menyimpan file
    public function store(Request $request)
    {
      // Validasi input
      $request->validate([
        'pdf' => 'required|mimes:pdf|max:2048', // Hanya menerima file PDF
    ]);

    // Simpan file ke storage
    if ($request->file('pdf')) {
        $path = $request->file('pdf')->store('uploads', 'public'); // Simpan di folder 'uploads'

        // Simpan path dan nama file ke database
        $berkas = new Berkas(); // Gunakan model Berkas
        $berkas->nama_file = $request->file('pdf')->getClientOriginalName(); // Simpan nama asli file
        $berkas->path = $path; // Simpan path di storage
        $berkas->save(); // Simpan ke database
    }

    return back()->with('success', 'File berhasil diupload dan disimpan ke database.');
    }

    // Method untuk menampilkan file yang di-upload
    public function read()
    {
        $berkass = Berkas::all(); // Mengambil semua data file dari database
        return view('detailupload', compact('berkass'));
    }
}
