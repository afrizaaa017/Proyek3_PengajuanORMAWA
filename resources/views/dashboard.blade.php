{{-- <!DOCTYPE html>
<html lang="id"> --}}

<head>
    @include('layouts.head')
    <title>Pengajuan Ketua ORMAWA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

{{-- <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500"> --}}
    <!-- sidenav -->
    {{-- @include('components.sidenav') --}}
    <!-- end sidenav -->

    @extends('components.main')
    @include('components.navbar2')

    
    @section('content')
    <div class="w-full px-4 py-6 mx-auto" id="content">
        <!-- Grid dengan Kolom Khusus -->
        <div class="custom-grid">
            
            <!-- Kotak Hijau -->
            <div class="kotak-hijau relative flex flex-col justify-between h-48">
                <h2 class="text-2xl font-bold text-white">Sudah <br> Mengajukan</h2>
                <p class="text-7xl font-bold text-left">{{ $sudahMengajukan }}</p>
            </div>

            <!-- Kotak Merah -->
            <div class="kotak-merah relative flex flex-col justify-between h-48">
                <h2 class="text-2xl font-bold text-white">Belum <br> Mengajukan</h2>
                <p class="text-7xl font-bold text-left">{{ $belumMengajukan }}</p>
            </div>

            <!-- Kotak Oranye (Lebih Lebar) -->
            <div class="kotak-oranye h-48">
                <a href="{{ url('/listtable') }}" class="block text-2xl md:text-4xl font-bold text-left">
                    Lihat Semua Pengajuan <br> ORMAWA
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            
            <!-- Dalam Antrean dan Sudah Berhasil (Pindah ke Kiri) -->
            <div class="space-y-4">
                <h2 class="text-xl font-bold">Dalam Antrean</h2>
                <div class="flex-container">
                    @foreach ($profilAntrean as $profil)
                    <div class="relative group inline-block">
                        <!-- Circle with initials -->
                        <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center cursor-pointer">
                          {{ strtoupper(substr($profil->nama, 0, 2)) }}
                        </div>
                        
                        <!-- Tooltip -->
                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-xs text-white bg-gray-800 rounded-lg py-1 px-2 shadow-lg">
                          {{ $profil->nama }}
                        </div>
                      </div>
                    @endforeach
                    {{-- <p class="ml-4">+{{ count($profilAntrean) }}</p> --}}
                </div>

                <h2 class="text-xl font-bold mt-4">Sudah Berhasil</h2>
                <div class="flex-container">
                    @foreach ($profilBerhasil as $profil)
                    <div class="relative group inline-block">
                        <!-- Circle with initials -->
                        <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center cursor-pointer">
                          {{ strtoupper(substr($profil->nama, 0, 2)) }}
                        </div>
                        
                        <!-- Tooltip -->
                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-xs text-white bg-gray-800 rounded-lg py-1 px-2 shadow-lg">
                          {{ $profil->nama }}
                        </div>
                      </div>
                    @endforeach
                    {{-- <p class="ml-4">+{{ count($profilBerhasil) }}</p> --}}
                </div>
            </div>

            <!-- Foto Gedung Polban (Pindah ke Kanan) -->
            <div class="w-full rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('assets/img/polban.jpg') }}" alt="Gedung Polban" class="gambar-gedung">
            </div>
        </div>
    </div>
    @endsection

    {{-- <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200"> --}}
        <!-- Navbar -->
        {{-- @include('components.nav') --}}

        <!-- end Navbar -->

        <!-- Main Content -->

    {{-- </main> --}}
{{-- </body>

</html> --}}
