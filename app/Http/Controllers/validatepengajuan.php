<?php

namespace App\Http\Controllers;
use App\Models\Pengajuan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Enums\PengajuanStatus;

class validatepengajuan extends Controller
{
    public function validatePengajuanStatus(): JsonResponse
    {
        $sedangDiprosesCount = Pengajuan::where('status', PengajuanStatus::SedangDiproses->value)->count();
        $ditolakCount = Pengajuan::where('status', PengajuanStatus::Ditolak->value)->count();
    
        if ($sedangDiprosesCount > 0 || $ditolakCount > 0) {
            return response()->json([
                'success' => false,
                'sedangDiproses' => $sedangDiprosesCount,
                'ditolak' => $ditolakCount
            ]);
        }
    
        return response()->json(['success' => true]);
    }
}
