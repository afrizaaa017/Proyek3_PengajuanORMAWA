<?php

namespace App\Http\Controllers;

use App\Models\timeline;
use Illuminate\Http\Request;

class timelinecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            "tanggal_pembukaan"=> "required",
            "keterangan_pembukaan"=> "required",
            "tanggal_revisi"=> "required",
            "keterangan_revisi"=> "required",
            "tanggal_penutupan"=> "required",
            "keterangan_penutupan"=> "required",
        ]) ;
        
        $timeline = new timeline();
        $timeline -> tanggal_pembukaan = $request ->input("tanggal_pembukaan");
        $timeline -> keterangan_pembukaan = $request -> input("keterangan_pembukaan");
        $timeline -> tanggal_revisi = $request -> input("tanggal_revisi");
        $timeline -> keterangan_revisi = $request -> input("keterangan_revisi");
        $timeline -> tanggal_penutupan = $request -> input("tanggal_penutupan");
        $timeline -> keterangan_pembukaan = $request -> input("keterangan_penutupan");
        $timeline -> save();

        return redirect("/dashboard") -> with('succes','timeline dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $timeline = timeline::findOrFail($id);

        return view('timeline.edit', compact('timeline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'timeline' => 'required',
        ]);
    
        $timeline = timeline::findOrFail($id);
        $timeline -> tanggal_pembukaan = $request ->input("tanggal_pembukaan");
        $timeline -> keterangan_pembukaan = $request -> input("keterangan_pembukaan");
        $timeline -> tanggal_revisi = $request -> input("tanggal_revisi");
        $timeline -> keterangan_revisi = $request -> input("keterangan_revisi");
        $timeline -> tanggal_penutupan = $request -> input("tanggal_penutupan");
        $timeline -> keterangan_pembukaan = $request -> input("keterangan_penutupan");
        $timeline -> save();
    
        return redirect('/timeline')->with('success', 'Revisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
