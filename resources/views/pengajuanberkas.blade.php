<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Ketua Ormawa</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Menggunakan CDN TailwindCSS -->
    <style>
        /* Import Font Gilroy */
        @font-face {
            font-family: 'Gilroy Light';
            src: url('C:\Users\HP\OneDrive - Politeknik Negeri Bandung\SEMESTER_3_2C_JTK\PROYEK3\UI\gilroy-free\Gilroy-FREE') format('truetype');
            /* Ganti dengan path font yang benar */
        }

        @font-face {
            font-family: 'Gilroy ExtraBold';
            src: url('C:\Users\HP\OneDrive - Politeknik Negeri Bandung\SEMESTER_3_2C_JTK\PROYEK3\UI\gilroy-free\Gilroy-FREE') format('truetype');
            /* Ganti dengan path font yang benar */
        }

        /* Gaya untuk mengubah warna background dan tulisan input file */
        input[type="file"]::-webkit-file-upload-button {
            background-color: #FF9A36;
            /* Warna background */
            color: white;
            /* Warna tulisan */
            border: none;
            /* Menghilangkan border */
            border-radius: 0.375rem;
            /* Border radius untuk sudut */
            padding: 0.5rem 1rem;
            /* Padding untuk tombol */
            cursor: pointer;
            /* Ubah kursor saat hover */
            font-family: 'Gilroy Light', sans-serif;
            /* Menggunakan font Gilroy Light untuk tombol */
        }

        input[type="file"] {
            display: block;
            /* Menampilkan input file sebagai block */
            width: 100%;
            /* Membuat input file memenuhi lebar kolom */
            border: 2px dashed #FF9A36;
            /* Garis putus-putus dengan warna yang sama */
            border-radius: 0.375rem;
            /* Border radius untuk sudut */
            padding: 0.5rem;
            /* Padding dalam input file */
            background-color: white;
            /* Warna latar belakang input file */
            font-family: 'Gilroy Light', sans-serif;
            /* Menggunakan font Gilroy ExtraBold untuk label */
            color: #A5A5A5;
            /* Warna "No file chosen" */
            transition: transform 0.2s;
            /* Efek transisi untuk timbul */
        }

        /* Gaya efek timbul untuk input file saat hover */
        input[type="file"]:hover {
            transform: translateY(-2px);
            /* Efek timbul saat hover */
        }

        /* Gaya untuk label dengan Gilroy ExtraBold */
        .label-custom {
            font-family: 'Gilroy ExtraBold', sans-serif;
            /* Font Gilroy ExtraBold */
            color: #295F98;
            /* Warna #295F98 */
        }

        /* Gaya untuk tombol dengan efek timbul */
        .btn-gradient {
            background: linear-gradient(to right, #00008B, #3B3BBD);
            /* Gradasi warna */
            border: none;
            /* Menghilangkan border */
            color: white;
            /* Warna tulisan */
            padding: 10px 20px;
            /* Padding tombol */
            border-radius: 0.375rem;
            /* Border radius untuk sudut */
            font-family: 'Gilroy ExtraBold', sans-serif;
            /* Menggunakan font Gilroy ExtraBold */
            transition: transform 0.2s;
            /* Efek transisi untuk timbul */
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            /* Efek timbul saat hover */
        }

        .btn-gradient:focus {
            outline: none;
            /* Menghilangkan outline */
        }

        /* Gaya untuk "No file chosen" */
        input[type="file"]::placeholder {
            font-family: 'Gilroy Light', sans-serif;
            /* Menggunakan font Gilroy Light untuk "No file chosen" */
            color: #A5A5A5;
            /* Warna "No file chosen" */
        }
    </style>
</head>

<body class="bg-white flex">

    <!-- Sidebar (Kosong) -->
    <div class="w-1/4 bg-gray-200 p-4 h-screen">
        <!-- Konten Sidebar (kosong) -->
    </div>

    <!-- Konten Utama -->
    <div class="flex-1 p-5 flex flex-col">
        <!-- Navbar (Kosong) -->
        <div class="bg-gray-300 p-4 mb-4">
            <!-- Konten Navbar (kosong) -->
        </div>

        <!-- Konten Upload Berkas -->
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container mx-auto mt-10 flex-1">
                <div class="grid grid-cols-2 gap-8">

                    <!-- Kolom Pertama (8 tempat upload file) -->
                    <div>
                        <!-- Tempat upload file 1 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="scan_ktp">Scan KTP</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none"
                                id="scan_ktp" type="file" name="pdf_file" accept=".pdf" required>
                        </div>
                        {{-- <!-- Tempat upload file 2 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="surat_sehat">Surat Sehat</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="surat_sehat" type="file">
                        </div>
                        <!-- Tempat upload file 3 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="surat_jurusan">Surat Rekomendasi Jurusan</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="surat_jurusan" type="file">
                        </div>
                        <!-- Tempat upload file 4 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="akademik">Transkip Akademik Semester Terakhir</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="akademik" type="file">
                        </div>
                        <!-- Tempat upload file 5 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="lkmm">Sertifikat LKMM</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="lkmm" type="file">
                        </div>
                        <!-- Tempat upload file 6 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="kepemimpinan">Sertifikat Pelatihan Kepemimpinan</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="kepemimpinan" type="file">
                        </div>
                        <!-- Tempat upload file 7 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="spiritual">Sertifikat Pelatihan Emosional Spiritual bagi Mahasiswa</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="spirit" type="file">
                        </div>
                        <!-- Tempat upload file 8 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="asing">Sertifikat Bahasa Asing</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="asing" type="file">
                        </div> --}}
                    </div>

                    <!-- Kolom Kedua (8 tempat upload file) -->
                    <div>
                        <!-- Tempat upload file 9 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="scan_ktm">Scan KTM</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none"
                                id="scan_ktm" type="file">
                        </div>
                        {{-- <!-- Tempat upload file 10 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="surat_baik">Surat Keterangan Berkelakuan Baik</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="surat_baik" type="file">
                        </div>
                        <!-- Tempat upload file 11 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="surat_mandiri">Surat Pernyataan Mandiri</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="surat_mandiri" type="file">
                        </div>
                        <!-- Tempat upload file 12 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="pkkmn">Sertifikat PKKMB</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="pkkmb" type="file">
                        </div>
                        <!-- Tempat upload file 13 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="bn">Sertifikat Bela Negara</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="bn" type="file">
                        </div>
                        <!-- Tempat upload file 14 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="aoc">Sertifikat Agent of Change</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="aoc" type="file">
                        </div>
                        <!-- Tempat upload file 15 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="organisasi">Sertifikat Berorganisasi (Minimal sebagai koordinator)</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="organiasasi" type="file">
                        </div>
                        <!-- Tempat upload file 16 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm label-custom" for="berita">Berita Acara Pemilihan</label>
                            <input class="block text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" id="berita" type="file">
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Tombol Previous dan Next -->
            <div class="flex justify-between mt-4">
                <button type="button" class="btn-gradient text-white py-2 px-4 rounded-lg shadow-lg">Previous</button>
                <button type="submit" class="btn-gradient text-white py-2 px-4 rounded-lg shadow-lg">Send</button>
            </div>
        </form>
    </div>
</body>

</html>
