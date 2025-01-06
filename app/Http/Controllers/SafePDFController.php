<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class SafePDFController extends Controller
{
    public function showPDF($id, $filename)
    {
        // $user = Auth::user(); // Gunakan Auth::user();
        $user = Auth::user();
        // dd($user);
        if (!$user) {
            abort(403, 'Anda harus login untuk mengakses file ini.');
        }

        // Path file di dalam storage
        $filePath = "private/laraview/$id/$filename";
    
        // Pastikan hanya Staff atau pemilik file yang bisa mengakses
                if ($user->role !== 'staff_kemahasiswaan' && $user->id != $id) {
                    response()->file(storage_path("app/$filePath"));
                }
        // Cek apakah file ada
        if (!Storage::exists($filePath)) {
            abort(404, 'File tidak ditemukan.');
        }
    
        // Kembalikan file sebagai response
        return response()->file(storage_path("app/$filePath"));
    }
    
}
