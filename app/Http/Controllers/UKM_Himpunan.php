<?php

namespace App\Http\Controllers;
use App\Models\UKM;
use App\Models\Himpunan;
use Illuminate\Http\Request;

class UKM_Himpunan extends Controller
{
    public function showUkmHimpunan()
{
    $ukms = Ukm::all(); // Mengambil semua data UKM
    $himpunans = Himpunan::all(); // Mengambil semua data Himpunan
    
    return view('ukm_himpunan', compact('ukms', 'himpunans'));
}

}
