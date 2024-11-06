<?php

namespace App\Http\Controllers;
use App\Models\KetuaOrmawa;
use Illuminate\Http\Request;

class KetuaOrmawaController extends Controller
{
    public function getKetuaOrmawa($ormawa_id)
    {
        $ketuaOrmawa = KetuaOrmawa::where('ormawa_id', $ormawa_id)->get();
        return response()->json($ketuaOrmawa);
    }
}
