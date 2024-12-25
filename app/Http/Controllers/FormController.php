<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Prodi;
use App\Models\Ormawa;
use App\Models\Jurusan;
use App\Models\Pengajuan;
use App\Models\KetuaOrmawa;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    // public function user()
    // {
    //     $users = User::all(); // Ambil semua user
    //     return view('tesDeleteUser', compact('users'));
    // }

    // public function deleteUser($id)
    // {
    //     $user = User::findOrFail($id);

    //     // Hapus user tanpa menghapus pengajuan
    //     $user->delete();

    //     return redirect()->back()->with('message', 'Akun user berhasil dihapus, pengajuan tetap tersimpan.');
    // }

    public function simpanPengajuan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:pengajuans', 
            'jurusan' => 'required',
            'prodi' => 'required',
            'ormawa' => 'required',
            'ketua_ormawa' => 'required',
            'periode' => 'required', 
            'telp' => 'required', 
            'email' => 'required',
        ]);

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
        return redirect()->route('pengajuanberkas')->with('success', 'Data has been saved successfully.');
    }
    
    public function detailPengajuan($id)
    {
        $pengajuans = Pengajuan::with('berkas')->find($id);

        if (!$pengajuans) {
            return redirect()->back()->with('error', 'Data pengajuan tidak ditemukan.');
        }

        return view('detailPengajuan', compact('pengajuans'));
    }

    public function index()
    {
        $userId = Auth::id();
        $exists = Pengajuan::where('user_id', $userId)->exists();
    
        if ($exists) {
            return redirect()->route('progrestabel')->with('error', 'Anda sudah memiliki pengajuan.');
        }

        if (session()->has('berkas')) {
            return redirect()->route('progrestabel')->with('success', 'Lengkapi berkas anda.');
        }

        $ormawas = Ormawa::all(); 
        $jurusans = Jurusan::all(); 
        $prodis = Prodi::all(); 
        $ketuaOrmawas = KetuaOrmawa::all(); 
    
        return view('form', compact('ormawas', 'jurusans', 'prodis', 'ketuaOrmawas')); 
    }

    public function updateStatus(Request $request, $id, $status)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $status;

        if ($status === 'Diterima') {
            $pengajuan->keterangan = 'Tidak ada revisi';
        } else if ($status === 'Perlu Revisi') {
            $request->validate([
                'revisi' => 'required|string',
            ]);
            $pengajuan->keterangan = $request->input('revisi');
        }
        else{
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $pengajuan->save();

        return redirect('/listtable')->with('success', 'Status pengajuan berhasil diperbarui.');
    }
    

    public function edit($id)
    {
        $ormawas = Ormawa::all(); 
        $jurusans = Jurusan::all(); 
        $prodis = Prodi::all(); 
        $ketuaOrmawas = KetuaOrmawa::all();
        $pengajuan = Pengajuan::findOrFail($id);

        return view('editPengajuan', compact('pengajuan','ormawas', 'jurusans', 'prodis', 'ketuaOrmawas'));
    }
    
    public function listtable(Request $request)
    {
        $selectedPeriode = $request->input('periode');

        $periodes = Pengajuan::select('periode')->distinct()->pluck('periode');

        $pengajuans = Pengajuan::when($selectedPeriode, function ($query) use ($selectedPeriode) {
            return $query->where('periode', $selectedPeriode);
        })->get();

        return view('listtable', compact('pengajuans', 'periodes', 'selectedPeriode'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:pengajuans,nim,' . $id, 
            'jurusan' => 'required',
            'prodi' => 'required',
            'ormawa' => 'required',
            'ketua_ormawa' => 'required',
            'periode' => 'required', 
            'telp' => 'required', 
            'email' => 'required',
        ],[
            'nim.unique' => 'NIM sudah digunakan. Silakan gunakan NIM lain.',
        ]);

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

        return redirect()->route('berkas.edit',['id' => $id])->with('success', 'Data has been saved successfully.');
    }
}
