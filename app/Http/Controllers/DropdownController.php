<?php
namespace App\Http\Controllers;

use App\Models\Ukm;
use App\Models\Himpunan;
use App\Models\BemMpm;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getUkm($ormawa_id)
{
    $ukm = Ukm::where('ormawa_id', $ormawa_id)->get();
    return response()->json($ukm);
}


    public function getHimpunan($ormawa_id)
    {
        $himpunans = Himpunan::where('ormawa_id', $ormawa_id)->pluck('nama_himpunan', 'id');
        return response()->json($himpunans);
    }

    public function getBemMpm($ormawa_id)
    {
        $bemmpms = BemMpm::where('ormawa_id', $ormawa_id)->pluck('is_bem', 'is_mpm');
        return response()->json($bemmpms);
    }
}
