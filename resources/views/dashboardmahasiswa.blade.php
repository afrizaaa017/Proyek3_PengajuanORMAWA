@extends('components.main')
@include('layouts.head')
@include('components.navbar2')

@section('content')
    <div class="w-full px-4 py-6 mx-auto" id="content">
        <!-- Kotak informasi ormawa belum disetujui dan pengajuan -->
        <div class="flex space-x-6 mb-6">
            <!-- Kotak biru dengan gradasi (ormawa yang belum disetujui) -->
            <div class="sm:max-w-md w-1/3 bg-gradient-to-r from-blue-500 to-blue-700 text-white py-6 px-4 rounded-lg shadow-lg flex flex-col h-48">
                <h2 class="text-2xl font-bold text-white mb-3 ml-4 mt-1/3">Pengajuan Belum Diterima</h2>
                <h2 class="text-7xl font-bold text-white mb-3 ml-4 mt-1/3">{{ $jumlahBelumDisetujui }}</h2>
                <!-- Button untuk membuka modal -->
                <button onclick="openPopup()" 
                    class="mt-4 bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold shadow-lg border border-blue-700 hover:bg-blue-700 hover:text-white transition duration-300">
                    Lihat Detail
                </button>
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
         <!-- Area Kosong untuk Timeline -->
        <div class="mx-auto my-auto py-5">
            <div class="flex justify-center">
                <ol class="items-center sm:flex">
                    @foreach ($timelines as $timeline)
                        <li class="relative mb-6 pr-3 pl-3" style="margin-center: 20px;">
                            <div class="flex justify-center">
                                <div class="z-10 flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full ring-0 ring-white shrink-0">
                                    <svg class="w-5.5 h-5.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h2 class="text-lg font-semibold text-gray-900">{{ $timeline->judul_timeline }}</h2>
                                <time class="block mb-2 text-sm font-normal leading-none text-gray-400">
                                    {{ $timeline->tanggal_timeline_awal }} - {{ $timeline->tanggal_timeline_akhir }}
                                </time>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
        
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

    <!-- Modal Popup -->
    <div id="popup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-1/2 max-h-[80vh] overflow-y-auto">
            <h3 class="text-xl font-bold mb-4">Pengajuan Belum Disetujui</h3>
            <ul>
                <!-- Menampilkan Ormawa yang pengajuannya belum disetujui atau belum mengajukan -->
                @foreach($allOrmawaBelumDisetujui as $ormawa)
                    <li class="mb-2">{{ $ormawa->nama_ketua ?? $ormawa->ketua_ormawa }}</li> <!-- Menampilkan nama Ormawa -->
                @endforeach
            </ul>
            <button onclick="closePopup()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg">Tutup</button>
        </div>
    </div>

    <script>
        // Fungsi untuk membuka pop-up
        function openPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }

        // Fungsi untuk menutup pop-up
        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
    </script>
@endsection
