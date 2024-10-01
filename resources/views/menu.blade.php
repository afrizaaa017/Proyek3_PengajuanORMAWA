<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Ketua Ormawa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white flex">

    @include('components.navbar')
    @include('components.sidebar')

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
    </div>
</body>
</html>
