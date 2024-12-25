@extends('components.main')
@include('layouts.head')
@include('components.navbar2')

@section('content')
    <div class=" w-full px-4 py-6 mx-auto" id="content">
        <!-- Kotak informasi ormawa belum disetujui dan pengajuan -->
        <div class="flex space-x-6 mb-6">
            <!-- Kotak biru dengan gradasi (ormawa yang belum disetujui) -->
            <div class="sm:max-w-md w-1/3 bg-gradient-to-r from-blue-500 to-blue-700 text-white py-6 px-4 rounded-lg shadow-lg flex flex-col h-48">
                <h2 class="text-2xl font-bold text-white mb-3 ml-4 mt-1/3">Belum Disetujui </h2>
                <h2 class="text-7xl font-bold text-white mb-3 ml-4 mt-1/3">{{ $jumlahBelumDisetujui }}</h2>
            </div>

            <!-- Kotak oranye (judul sistem informasi) dengan gambar latar -->
            <div class="w-2/3 relative bg-orange-500 rounded-lg shadow-lg overflow-hidden h-48">
                <img src="{{ asset('assets/img/polban.jpg') }}" alt="Gedung Polban" class="absolute inset-0 w-full h-full object-cover opacity-50">
                <div class="relative z-10 p-4 flex items-center justify-center h-full">
                    <h2 class="text-5xl font-bold text-white text-center">Pengajuan Ketua ORMAWA</h2>
                </div>
            </div>
        </div>

        <!-- disini buat timeline alqan -->

        <div class="mb-10">
            <h3 class="text-center text-xl font-bold text-[#344767] py-2">Persyaratan Data Pengajuan</h3>
            <iframe class="mx-auto" src="{{ asset('laraview/Persyaratan/persyaratan_2024.pdf' ) }}" width="50%" height="600px"></iframe>
        </div>
        
        <!-- Tombol Lakukan Pengajuan -->
        <div class="flex my-auto mx-auto py-5">
            <a href="{{ route('form') }}" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold text-center py-3 rounded-lg block h-18">
                Lakukan Pengajuan
            </a>
        </div>
    </div>
@endsection
