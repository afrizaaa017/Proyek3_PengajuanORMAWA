<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Pengajuan;

class selectedValue extends Controller
{
    public function storeSelectedValue(Request $request)
    {
        // Ambil data dari request
        $selectedValue = $request->input('selectedValue');
        $selectedDropdown = $request->input('selectedDropdown');
    
        // Simpan ke kolom `ketua_ormawa` pada model yang diinginkan
        // Misalnya, model `OrmawaLeader`
        $leader = new Pengajuan();
        $leader->ketua_ormawa = $selectedValue;
        $leader->type = $selectedDropdown; // optional: simpan tipe dropdown
        $leader->save();
    
        return response()->json(['message' => 'Data berhasil disimpan']);
    }
    

}
