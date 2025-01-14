<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Ormawa;
use App\Models\Jurusan;
use App\Models\Pengajuan;
use App\Models\KetuaOrmawa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PengajuanNotifikasi;

class FormController extends Controller
{
    public function kelolaUser()
    {
        $user = User::all(); // Ambil semua user
        return view('TambahUser', compact('user'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@polban\.ac\.id$/|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required'
        ],[
            'email.regex' => 'Email harus menggunakan domain @polban.ac.id',
            'password.min' => 'Password harus memiliki minimal 6 karakter.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Hapus user tanpa menghapus pengajuan
        $user->delete();

        return redirect()->back()->with('message', 'Akun user berhasil dihapus, pengajuan tetap tersimpan.');
    }

    public function simpanPengajuan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|numeric|unique:pengajuans',
            'jurusan' => 'required',
            'prodi' => 'required',
            'ormawa' => 'required',
            'ketua_ormawa' => 'required',
            'periode' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required',
        ], [
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM sudah terdaftar, masukan NIM anda.',
            'telp.numeric' => 'Nomor telepon harus berupa angka.',
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

    public function detailSurat($id)
    {
        $pengajuans = Pengajuan::with('berkas')->find($id);

        if (!$pengajuans) {
            return redirect()->back()->with('error', 'Data pengajuan tidak ditemukan.');
        }

        return view('detailUploadSurat', compact('pengajuans'));
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

            $pengajuan->save();
            return redirect()->route('listtable')->with('successDiterima', "Status pengajuan dengan No Pengajuan {$pengajuan->id} berhasil diperbarui.");
        } else if ($status === 'Perlu Revisi') {
            $request->validate([
                'revisi' => 'required|string',
            ]);
            $pengajuan->keterangan = $request->input('revisi');

            $pengajuan->save();
            $user = User::find($pengajuan->user_id);
            $user->notify(new PengajuanNotifikasi($pengajuan, 'revisi', false));
            return redirect()->route('listtable')->with('successRevisi', "Status pengajuan dengan No Pengajuan {$pengajuan->id} berhasil diperbarui.");
        }
        else{
            return redirect()->back()->with('error', 'Status tidak valid.');
        }
    }


    public function edit($nim, $id)
    {
        $ormawas = Ormawa::all();
        $jurusans = Jurusan::all();
        $prodis = Prodi::all();
        $ketuaOrmawas = KetuaOrmawa::all();
        // $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan = Pengajuan::where('id', $id)->where('nim', $nim)->firstOrFail();

        return view('editPengajuan', compact('pengajuan', 'ormawas', 'jurusans', 'prodis', 'ketuaOrmawas'));
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

    public function update(Request $request, $nim, $id)
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
        ], [
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

        return redirect()->route('berkas.edit', ['nim' => $nim, 'id' => $id])->with('success', 'Data has been saved successfully.');
    }
}
