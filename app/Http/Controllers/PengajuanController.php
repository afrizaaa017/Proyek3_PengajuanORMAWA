<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Himpunan;
use App\Models\UKM;
use App\Models\BEM_UKM
;
class PengajuanController extends Controller
{
    public function pengajuanHimpunan()
    {
        // Mengambil semua data dari model Ormawas
        $data['Ormawa'] = Ormawa::get(["id_ormawa","Nama_UKM"]);
        return view('pengajuanhimpunan', $data);
        // Mengembalikan data ke view 'pengajuanhimpunan'
        
    }

    public function BEM_UKM(Request $request)
    {
        $data['BEM_UKM'] = BEM_UKM::where("id_ormawa",$request->id_ormawa)->get(["id_bem&ukm","Bem&ukm"]);
    }

    public function Himpunan(Request $request)
    {
        $data['Himpunan'] = Himpunan::where("id_ormawa",$request->id_ormawa)->get(["id_himpunan","Nama_himpunan"]);
    }

    public function UKM(Request $request)
    {
        $data['UKM'] = UKM::where("id_ormawa",$request->id_ormawa)->get(["id_UKM","Nama_UKM"]);
    }
  

    public function pengajuanUKM()
    {
        return view('pengajuanukm', [       
        ]);
        
    }

    public function pengajuanPusat()
    {
        return view('pengajuanpusat', [       
        ]);
        
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
