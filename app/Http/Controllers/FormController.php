<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Ormawa;
use App\Models\Jurusan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PengajuanNotifikasi;
// use Illuminate\Support\Facades\Notification;


class FormController extends Controller
{

    public function simpanPengajuan(Request $request)
    {

        try {
            $pengajuan = Pengajuan::create([

                'nama'      => $request->nama,
                'nim'    => $request->nim,
                'jurusan'    => $request->jurusan,
                'prodi'     => $request->prodi,
                'ormawa'    => $request->ormawa,
                //membuat variabel lain saya bingung apa dan seharusnya memanggil chain database ormawa yang terpilih
                'periode'    => $request->periode,
                'telp'    => $request->telp,
                'email'    => $request->email,
            ]);

            // dd($request->all());

            // dd($request);

            Notification::route('mail', $request->email)
                ->notify(new PengajuanNotifikasi($pengajuan->toArray()));

            return redirect('/pengajuanberkas')->with('success', 'Pengajuan berhasil disimpan dan notifikasi telah dikirim.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal disimpan: ' . $e->getMessage());
        }
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
