<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengajuan Ketua Ormawa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="relative bg-gray-100">

    <div class="absolute bg-green-500 text-white p-6 rounded-lg" style="width: 235px; height: 256px; left: 382px; top: 237px;">
        <h2 class="text-xl font-bold">Sudah Mengajukan</h2>
        <p class="text-4xl">{{ $sudahMengajukan }}</p>
    </div>

    <div class="absolute bg-red-500 text-white p-6 rounded-lg" style="width: 235px; height: 256px; left: 629px; top: 237px;">
        <h2 class="text-xl font-bold">Belum Mengajukan</h2>
        <p class="text-4xl">{{ $belumMengajukan }}</p>
    </div>

    <!-- Pastikan warna oranye diterapkan dengan benar -->
    <div class="absolute bg-orange-500 text-white text-center py-4 rounded-lg" style="width: 987px; height: 266px; left: 886px; top: 237px;">
        <a href="{{ url('/semua-pengajuan') }}" class="block text-xl">
            Lihat Semua Pengajuan ORMAWA
        </a>
    </div>

    <div class="absolute bg-gray-300 p-6 rounded-lg" style="width: 523px; height: 532px; left: 366px; top: 520px;">
        <h2 class="text-xl font-bold">Dalam Antrean</h2>
        <ul>
            @foreach ($profilAntrean as $profil)
                <li>{{ $profil }}</li>
            @endforeach
        </ul>
        <p class="mt-4">+{{ count($profilAntrean) }}</p>
    </div>

    <div class="absolute" style="width: 968px; height: 532px; left: 905px; top: 520px;">
        <img src="{{ asset('images/polban-building.jpg') }}" alt="Gedung Polban" class="w-full h-full object-cover rounded-lg">
    </div>

</body>
</html>
