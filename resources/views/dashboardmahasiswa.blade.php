<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pengajuan Ketua ORMAWA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Gilroy */
        body {
            font-family: 'Gilroy', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6 m-6">
        <!-- Kotak informasi ormawa belum disetujui dan pengajuan -->
        <div class="flex space-x-6 mb-6">
            <!-- Kotak biru dengan gradasi (ormawa yang belum disetujui) -->
            <div class="w-1/3 bg-gradient-to-r from-blue-500 to-blue-700 text-white py-6 px-4 rounded-lg shadow-lg flex flex-col h-48">
                <h2 class="text-4xl font-bold text-white mb-3 ml-4 mt-1/3">Belum <br> Disetujui</h2>
                <p class="text-6xl font-bold text-left ml-4">{{ $notApprovedOrmawa }}</p>
            </div>


            <!-- Kotak oranye (judul sistem informasi) dengan gambar latar -->
            <div class="w-2/3 relative bg-orange-500 rounded-lg shadow-lg overflow-hidden h-48">
                <img src="{{ asset('assets/img/polban.jpg') }}" alt="Gedung Polban" class="absolute inset-0 w-full h-full object-cover opacity-50">
                <div class="relative z-10 p-4 flex items-center justify-center h-full">
                    <h2 class="text-5xl font-bold text-white text-center">Pengajuan Ketua ORMAWA</h2>
                </div>
            </div>
        </div>

        <!-- Area Kosong untuk Timeline -->
        <div class="mb-60">
            <!-- Timeline akan dipanggil di sini dari program lain -->
            @include('path.to.timeline-component')
        </div>

        <!-- Tombol Lakukan Pengajuan -->
        <div class="w-full mt-auto">
        <a href="{{ route('pengajuan.create') }}" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold text-center py-3 rounded-lg block h-18">
                Lakukan Pengajuan
            </a>
        </div>
    </div>

</body>
</html>



<!-- <!DOCTYPE html>
<html>

    <head>
        @include('layouts.head')
        <title>Pengajuan Ketua ORMAWA</title>
    </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500"> -->
    <!-- sidenav  -->
    <!-- @include('component.sidebar2') -->
    <!-- end sidenav -->

    <!-- <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200"> -->
      <!-- Navbar -->
      <!-- @include('component.navbar2') -->
      <!-- end Navbar -->

    <!-- Main Content Area -->
    <!-- <div class="flex-grow flex flex-col items-center justify-content-center mt-10 p-4"> -->
        <!-- Spacer to prevent overlap with navbar -->
        <!-- <div class="h-20 ">
        </div> Adjust height as needed -->

        <!-- Title -->
        <!-- <h1 class="text-3xl font-semibold text-gray-800 mb-8">Pengajuan Ketua Ormawa</h1> -->
        
        <!-- Buttons Container -->
        <!-- <div class="w-full max-w-lg space-y-4">
            <a href="pengajuanpusat" class="block w-full text-center py-6 text-white font-semibold text-lg bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-md hover:bg-blue-700 transition">
                MPM DAN BEM
            </a>
            <a href="pengajuanhimpunan" class="block w-full text-center py-6 text-white font-semibold text-lg bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-md hover:bg-blue-700 transition">
                HIMPUNAN MAHASISWA
            </a>
            <a href="pengajuanukm" class="block w-full text-center py-6 text-white font-semibold text-lg bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-md hover:bg-blue-700 transition">
                UNIT KEGIATAN MAHASISWA
            </a>
        </div>
        {{-- @include('component.footer') --}}
    </div>
    </main>
{{-- @include('layouts.fixedplugin') --}}
  </body>
  @include('component.script')
</html> -->
