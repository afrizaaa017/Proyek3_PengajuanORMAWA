<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function show($id, $filename)
    {
        // dd($id, $filename);
        // dd('masuk!!');

        // Periksa apakah pengguna memiliki hak untuk mengakses file
        // if (!auth()->check()) {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Lokasi file privat
        $path = storage_path("app/PDF/{$id}/{$filename}");

        // Periksa keberadaan file
        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        //cek akses berdasarkan role dan sesi
        if ($user->role_id != 'staff_kemahasiswaan') {
            // Jika bukan staff, periksa apakah user memiliki hak untuk melihat file
            $uploadedBy = $this->getFileUploader($id, $filename);
            if ($user->id !== $uploadedBy) {
                abort(404, 'File not found');
            }
        }

        // Kirim file sebagai respons
        return response()->file($path);
    }

    private function getFileUploader($id) {
        //ambil berkas by id
        $berkas = Berkas::find($id);

        return $berkas ? $berkas->pengajuan->user_id : null;
    }

}