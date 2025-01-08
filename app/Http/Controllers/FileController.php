<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function serveFile($id, $filename)
    {
        // Periksa apakah pengguna adalah staff
        if (Auth::user()->role_id !== 'staff_kemahasiswaan') {
            abort(403, 'Anda tidak diizinkan mengakses file ini.');
        }

        // Bangun path file
        $filePath = storage_path("app/laraview/{$id}/{$filename}");

        // Periksa apakah file ada
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan.');
        }

        // Kirim file sebagai respons
        return response()->file($filePath);
    }
}

