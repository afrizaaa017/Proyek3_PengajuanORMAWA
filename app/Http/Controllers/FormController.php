<?php 

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $ormawas = Ormawa::all(); // Fetch all Ormawa data
        return view('form', compact('ormawas')); // Pass data to view
    }
}

