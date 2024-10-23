<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Himpunan;
use App\Models\UKM;
use App\Models\BEM_MPM
;
class PengajuanController extends Controller
{
    public function pengajuanHimpunan()
    {
        // Mengambil semua data dari model Ormawas
        $data['Ormawa'] = Ormawa::get(["id_ormawa","nama_ormawa"]);
        return view('pengajuanhimpunan', $data);
        // Mengembalikan data ke view 'pengajuanhimpunan'
        
    }
    public function dropdown(){
    {
        $ormawas = Ormawa::all(); // Fetch all Ormawa data
        return view('pengajuanhimpunan', compact('ormawas')); // Pass data to view
    }
}
    


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
    // public function index()

    // {

    //     $data['countries'] = Country::get(["name", "id"]);

    //     return view('dropdown', $data);

    // }



}
