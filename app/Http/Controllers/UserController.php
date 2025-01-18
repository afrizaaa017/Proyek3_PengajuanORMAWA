<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUser()
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

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        // Hapus user tanpa menghapus pengajuan
        $user->delete();

        return redirect()->back()->with('message', 'Akun user berhasil dihapus, pengajuan tetap tersimpan.');
    }
    
}
