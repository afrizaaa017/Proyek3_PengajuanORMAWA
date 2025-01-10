<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($id, $filename)
    {
        // dd($id, $filename);
        // dd('masuk!!');

        // Periksa apakah pengguna memiliki hak untuk mengakses file
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Lokasi file privat
        $path = storage_path("app/PDF/{$id}/{$filename}");

        // Periksa keberadaan file
        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        // Kirim file sebagai respons
        return response()->file($path);
    }

}