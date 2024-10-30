<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengajuan Ketua Ormawa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="relative bg-gray-100">

    @include('components.sidenav');
    @include('components.nav');

    <!-- Mengubah kotak hijau menjadi warna gradasi dengan angka di kiri bawah -->
    <div class="absolute text-white p-6 rounded-lg flex flex-col justify-between" 
         style="background: linear-gradient(to right, #29B147, #8BE52E); width: 195px; height: 200px; left: 382px; top: 237px;">
        <h2 class="text-2xl font-bold">Sudah <br> Mengajukan</h2>
        <p class="text-7xl font-bold text-left">{{ $sudahMengajukan }}</p>
    </div>

    <!-- Kotak Merah dengan Gradasi -->
    <div class="absolute text-white p-6 rounded-lg flex flex-col justify-between" 
         style="background: linear-gradient(to right, #C20000, #FF0000); width: 195px; height: 200px; left: 590px; top: 237px;">
        <h2 class="text-2xl font-bold">Belum <br> Mengajukan</h2>
        <p class="text-7xl font-bold text-left">{{ $belumMengajukan }}</p>
    </div>

    <!-- Pastikan warna gradasi oranye diterapkan -->
    <div class="absolute text-white py-4 rounded-lg flex items-center pl-8" 
         style="background: linear-gradient(to right, #F24E1E, #FF9A36); width: 715px; height: 200px; left: 800px; top: 237px;">
        <a href="{{ url('/semua-pengajuan') }}" class="block text-5xl font-bold text-left">
            Lihat Semua Pengajuan <br> ORMAWA
        </a>
    </div>

    <!-- Tempat untuk Foto Gedung Polban -->
    <div class="absolute" style="width: 715px; height: 330px; left: 800px; top: 450px;">
        <img src="{{ asset('assets/img/polban.jpg') }}" alt="Gedung Polban" class="w-full h-full object-cover rounded-lg">
    </div>

    <!-- Dalam Antrean -->
    <div class="absolute" style="left: 380px; top: 450px; margin-top: 10px;">
        <h2 class="text-xl font-bold mb-2">Dalam Antrean</h2>
        <div class="bg-gray-300 p-6 rounded-lg flex items-center" style="width: 405px; height: 100px; margin-bottom: 40px;">
            <div class="flex space-x-2">
                @foreach (array_slice($profilAntrean, 0, 4) as $profil)
                    <div class="w-10 h-10 bg-gray-400 rounded-full flex items-center justify-center text-white">
                        {{ strtoupper(substr($profil, 0, 1)) }}
                    </div>
                @endforeach
            </div>
            <p class="ml-4">+{{ count($profilAntrean) }}</p>
        </div>
    </div>

    <!-- Sudah Berhasil -->
    <div class="absolute" style="left: 380px; top: 600px; margin-top: 20px;">
        <h2 class="text-xl font-bold mb-2">Sudah Berhasil</h2>
        <div class="bg-gray-300 p-6 rounded-lg flex items-center" style="width: 405px; height: 100px;">
            <div class="flex space-x-2">
                @foreach (array_slice($profilBerhasil, 0, 4) as $profil)
                    <div class="w-10 h-10 bg-gray-400 rounded-full flex items-center justify-center text-white">
                        {{ strtoupper(substr($profil, 0, 1)) }}
                    </div>
                @endforeach
            </div>
            <p class="ml-4">+{{ count($profilBerhasil) }}</p>
        </div>
    </div>

</body>
</html>
