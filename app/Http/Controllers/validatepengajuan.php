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
        $menungguVerifikasiCount = Pengajuan::where('status', PengajuanStatus::MenungguVerifikasi->value)->count();
        $perluRevisiCount = Pengajuan::where('status', PengajuanStatus::PerluRevisi->value)->count();
    
        if ($menungguVerifikasiCount > 0 || $perluRevisiCount > 0) {
            return response()->json([
                'success' => false,
                'Menunggu Verifikasi' => $menungguVerifikasiCount,
                'Perlu Revisi' => $perluRevisiCount
            ]);
        }
    
        return response()->json(['success' => true]);
    }
}
