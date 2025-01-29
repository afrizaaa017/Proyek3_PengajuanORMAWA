<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //Menampilkan login form
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role_id == 'mahasiswa') {
                return redirect()->route('mahasiswa.index');
            } elseif ($user->role_id == 'staff_kemahasiswaan') {
                return redirect()->route('kemahasiswaan.index');
            } else {
                return redirect()->route('login')->withErrors(['error' => 'Role tidak terdaftar.']);
            }
        }

        return view('Pages.Auth.login');
    }

    //Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@polban\.ac\.id$/',
            ],
            'password' => 'required|min:6',
        ], [
            'email.regex' => 'Gunakan email polban!',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (!in_array($user->role_id, ['mahasiswa', 'staff_kemahasiswaan'])) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->withErrors([
                    'email' => 'Hanya mahasiswa dan staff yang diizinkan login.',
                ]);
            }

            if ($user->role_id == 'mahasiswa') {
                return redirect()->route('mahasiswa.index');  // Halaman untuk mahasiswa
            } elseif ($user->role_id == 'staff_kemahasiswaan') {
                return redirect()->route('kemahasiswaan.index');  // Halaman untuk staff
            }

            // Default redirect jika role tidak ditemukan
            return redirect()->intended('/login');
        }

        return back()->withErrors(['email' => 'Email or password is incorrect.'])->onlyInput('email');
    }

    //Handle lupa password
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'auth_code' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Email tidak ditemukan!'], 400);
        }

        if ($request->auth_code !== '123456') {
            return response()->json(['message' => 'Kode autentikasi salah!'], 400);
        }

        Session::put('auth_email', $request->email);
        return response()->json(['message' => 'Verified!'], 200);
    }

    //Handle reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $email = Session::get('auth_email');
        if (!$email) {
            return response()->json(['message' => 'Unauthorized request. Please restart the process.'], 400);
        }

        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        Session::forget('auth_email');
        return response()->json(['message' => 'Password updated successfully!'], 200);
    }

    //Logout 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
