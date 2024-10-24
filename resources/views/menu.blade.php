<!DOCTYPE html>
<html>

    <head>
        @include('layouts.head')
        <title>Pengajuan Ketua ORMAWA</title>
    </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('component.sidebar2')
    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
      @include('component.navbar2')
      <!-- end Navbar -->

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col items-center justify-content-center mt-10 p-4">
        <!-- Spacer to prevent overlap with navbar -->
        <div class="h-20 ">
        </div> <!-- Adjust height as needed -->

        <!-- Title -->
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Pengajuan Ketua Ormawa</h1>
        
        <!-- Buttons Container -->
        <div class="w-full max-w-lg space-y-4">
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
</html>
