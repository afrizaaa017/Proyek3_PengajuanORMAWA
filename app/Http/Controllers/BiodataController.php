<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiodataRequest;
use App\Models\Prodi;
use App\Models\Ormawa;
use App\Models\Jurusan;
use App\Models\Pengajuan;
use App\Models\KetuaOrmawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    //Menampilkan form untuk menambah data biodata pengajuan baru
    public function createBiodata()
    {
        $userId = Auth::id();
        $exists = Pengajuan::where('user_id', $userId)->exists();

        if ($exists) {
            return redirect()->route('progress.tabel.show')->with('error', 'Anda sudah memiliki pengajuan.');
        }

        if (session()->has('berkas')) {
            return redirect()->route('progress.tabel.show')->with('success', 'Lengkapi berkas anda.');
        }

        $ormawas = Ormawa::all();
        $jurusans = Jurusan::all();
        $prodis = Prodi::all();
        $ketuaOrmawas = KetuaOrmawa::all();

        return view('Pages.Mahasiswa.pengajuan_biodata', compact('ormawas', 'jurusans', 'prodis', 'ketuaOrmawas'));
    }

    //Menyimpan data biodata pengajuan baru ke session
    public function storeBiodata(StoreBiodataRequest $request)
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
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('pengajuan.berkas.create')->with('success', 'Data has been saved successfully.');
    }

    //Menampilkan form untuk mengedit data biodata pengajuan tertentu
    public function editBiodata($nim, $id)
    {
        $ormawas = Ormawa::all();
        $jurusans = Jurusan::all();
        $prodis = Prodi::all();
        $ketuaOrmawas = KetuaOrmawa::all();
        $pengajuan = Pengajuan::where('id', $id)->where('nim', $nim)->firstOrFail();

        return view('Pages.Mahasiswa.revisi_pengajuan_biodata', compact('pengajuan', 'ormawas', 'jurusans', 'prodis', 'ketuaOrmawas'));
    }

    //Memperbarui data biodata pengajuan tertentu di database
    public function updateBiodata(StoreBiodataRequest $request, $nim, $id)
    {
        $request->session()->put('revisiPengajuan', [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'jurusan' => $request->input('jurusan'),
            'prodi' => $request->input('prodi'),
            'periode' => $request->input('periode'),
            'ormawa' => $request->input('ormawa'),
            'ketua_ormawa' => $request->input('ketua_ormawa'),
            'telp' => $request->input('telp'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('pengajuan.berkas.edit', ['nim' => $nim, 'id' => $id])->with('success', 'Data has been saved successfully.');
    }
}
