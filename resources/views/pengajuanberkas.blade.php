<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Ketua Ormawa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<style>
    input[type="file"]::-webkit-file-upload-button {
        background-color: #FF9A36; 
        color: white; 
        border: none; 
        border-radius: 0.375rem; 
        padding: 0.5rem 1rem; 
        cursor: pointer; 
        font-family: 'Gilroy Light', sans-serif; 
    }
</style>
<body class="bg-white flex">

    @include('components.navbar')
    @include('components.sidebar')

    <!-- Sidebar (Kosong) -->
    <div class="w-1/4 p-4 h-screen">
        <!-- Konten Sidebar (kosong) -->
    </div>

    <!-- Konten Utama -->
    <div class="flex-1 p-5 flex flex-col">
        <!-- Navbar (Kosong) -->
        <div class="p-4 mb-4">
            <!-- Konten Navbar (kosong) -->
        </div>

        <!-- Konten Upload Berkas -->
        <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container mx-auto mt-10 flex-1">
                <div class="grid grid-cols-2 gap-8">

                <!-- Kolom Pertama (8 tempat upload file) -->
                <div>
                    <!-- Tempat upload file 1 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="scan_ktp">Scan KTP</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="scan_ktp" type="file">
                    </div>
                    <!-- Tempat upload file 2 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_sehat">Surat Sehat</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_sehat" type="file">
                    </div>
                    <!-- Tempat upload file 3 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_jurusan">Surat Rekomendasi Jurusan</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_jurusan" type="file">
                    </div>
                    <!-- Tempat upload file 4 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="akademik">Transkip Akademik Semester Terakhir</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="akademik" type="file">
                    </div>
                    <!-- Tempat upload file 5 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="lkmm">Sertifikat LKMM</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="lkmm" type="file">
                    </div>
                    <!-- Tempat upload file 6 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="kepemimpinan">Sertifikat Pelatihan Kepemimpinan</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="kepemimpinan" type="file">
                    </div>
                    <!-- Tempat upload file 7 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="spiritual">Sertifikat Pelatihan Emosional Spiritual bagi Mahasiswa</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="spirit" type="file">
                    </div>
                    <!-- Tempat upload file 8 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="asing">Sertifikat Bahasa Asing</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="asing" type="file">
                    </div>
                </div>

                <!-- Kolom Kedua (8 tempat upload file) -->
                <div>
                    <!-- Tempat upload file 9 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="scan_ktm">Scan KTM</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="scan_ktm" type="file">
                    </div>
                    <!-- Tempat upload file 10 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_baik">Surat Keterangan Berkelakuan Baik</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_baik" type="file">
                    </div>
                    <!-- Tempat upload file 11 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_mandiri">Surat Pernyataan Mandiri</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_mandiri" type="file">
                    </div>
                    <!-- Tempat upload file 12 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="pkkmb">Sertifikat PKKMB</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="pkkmb" type="file">
                    </div>
                    <!-- Tempat upload file 13 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="bn">Sertifikat Bela Negara</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="bn" type="file">
                    </div>
                    <!-- Tempat upload file 14 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="aoc">Sertifikat Agent of Change</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="aoc" type="file">
                    </div>
                    <!-- Tempat upload file 15 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="organisasi">Sertifikat Berorganisasi (Minimal sebagai koordinator)</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="organisasi" type="file">
                    </div>
                    <!-- Tempat upload file 16 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="berita">Berita Acara Pemilihan</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="berita" type="file">
                    </div>
                </div>
            </div>

        <!-- Tombol Previous dan Next -->
        <div class="flex justify-between mt-4">
            <button type="button" class="bg-gradient-to-r from-[#00008B] to-[#3B3BBD] text-white py-2 px-4 rounded-lg shadow-lg font-extrabold transition duration-200 ease-in-out hover:-translate-y-1">Previous</button>
            <button type="button" class="bg-gradient-to-r from-[#00008B] to-[#3B3BBD] text-white py-2 px-4 rounded-lg shadow-lg font-extrabold transition duration-200 ease-in-out hover:-translate-y-1">Send</button>
        </div>
    </div>
</body>
</html>
