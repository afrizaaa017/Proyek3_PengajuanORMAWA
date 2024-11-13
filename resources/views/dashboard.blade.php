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
        <!-- Modal toggle -->
        <div class="flex justify-center m-5">
            <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
            Create product
            </button>
        </div>

        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add Product
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="#">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                            </div>
                            <div>
                                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                            </div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Select category</option>
                                    <option value="TV">TV/Monitors</option>
                                    <option value="PC">PC</option>
                                    <option value="GA">Gaming/Console</option>
                                    <option value="PH">Phones</option>
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>                    
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add new product
                        </button>
                    </form>
                </div>
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
