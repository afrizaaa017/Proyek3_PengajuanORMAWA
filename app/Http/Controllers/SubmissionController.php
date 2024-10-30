<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        // Definisikan variabel
        $sudahMengajukan = 10;
        $belumMengajukan = 9;
        $profilAntrean = ['Ormawa A', 'Ormawa B', 'Ormawa C', 'Ormawa D'];
        $profilBerhasil = ['Ormawa E', 'Ormawa F', 'Ormawa G', 'Ormawa H'];

        // Kirim data ke view menggunakan fungsi compact
        return view('dashboard', compact('sudahMengajukan', 'belumMengajukan', 'profilAntrean', 'profilBerhasil'));
    }
}
