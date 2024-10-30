<!DOCTYPE html>
<html lang="id">

<head>
    @include('layouts.head')
    <title>Pengajuan Ketua ORMAWA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <!-- sidenav -->
    @include('components.sidenav')
    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->
        @include('components.nav')
        <!-- end Navbar -->

        <!-- Main Content -->
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
                    <a href="{{ url('/semua-pengajuan') }}" class="block text-2xl md:text-4xl font-bold text-left">
                        Lihat Semua Pengajuan <br> ORMAWA
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                
                <!-- Dalam Antrean dan Sudah Berhasil (Pindah ke Kiri) -->
                <div class="space-y-4">
                    <h2 class="text-xl font-bold">Dalam Antrean</h2>
                    <div class="flex-container">
                        @foreach (array_slice($profilAntrean, 0, 4) as $profil)
                        <div class="profil-circle">
                            {{ strtoupper(substr($profil, 0, 1)) }}
                        </div>
                        @endforeach
                        <p class="ml-4">+{{ count($profilAntrean) }}</p>
                    </div>

                    <h2 class="text-xl font-bold mt-4">Sudah Berhasil</h2>
                    <div class="flex-container">
                        @foreach (array_slice($profilBerhasil, 0, 4) as $profil)
                        <div class="profil-circle">
                            {{ strtoupper(substr($profil, 0, 1)) }}
                        </div>
                        @endforeach
                        <p class="ml-4">+{{ count($profilBerhasil) }}</p>
                    </div>
                </div>

                <!-- Foto Gedung Polban (Pindah ke Kanan) -->
                <div class="w-full rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('assets/img/polban.jpg') }}" alt="Gedung Polban" class="gambar-gedung">
                </div>
            </div>
        </div>
    </main>
</body>

</html>
