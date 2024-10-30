<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil notifikasi yang belum dibaca dari pengguna yang sedang login
        // $unreadNotifications = Auth::user()->unreadNotifications;

        // // Kirim data ke view
        return view('notifikasi');
    }
}
