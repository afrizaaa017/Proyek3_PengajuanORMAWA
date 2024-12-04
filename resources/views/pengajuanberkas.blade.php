<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
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

@extends('components.main')
@include('components.navbar2')


<!-- Konten Utama -->
@section('content')
    <div class="flex-1 p-5 flex flex-col">
        <!-- Navbar (Kosong) -->
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
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="scan_ktp" type="file" name="scan_ktp" name="scan_ktp">
                        </div>
                        <!-- Tempat upload file 2 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_sehat">Surat Sehat</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_sehat" type="file" name="surat_sehat">
                        </div>
                        <!-- Tempat upload file 3 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_rekomendasi_jurusan">Surat Rekomendasi Jurusan</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_rekomendasi_jurusan" type="file" name="surat_rekomendasi_jurusan">
                        </div>
                        <!-- Tempat upload file 4 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="transkip_rekomendasi_jurusan">Transkip Akademik Semester Terakhir</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="transkip_rekomendasi_jurusan" type="file" name="transkip_rekomendasi_jurusan">
                        </div>
                        <!-- Tempat upload file 5 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_lkmm">Sertifikat LKMM</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_lkmm" type="file" name="sertifikat_lkmm">
                        </div>
                        <!-- Tempat upload file 6 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_pelatihan_kepemimpinan">Sertifikat Pelatihan Kepemimpinan</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_pelatihan_kepemimpinan" type="file" name="sertifikat_pelatihan_kepemimpinan">
                        </div>
                        <!-- Tempat upload file 7 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_pelatihan_emosional_spiritual">Sertifikat Pelatihan Emosional Spiritual bagi Mahasiswa</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_pelatihan_emosional_spiritual" type="file" name="sertifikat_pelatihan_emosional_spiritual">
                        </div>
                        <!-- Tempat upload file 8 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_bahasa_asing">Sertifikat Bahasa Asing</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_bahasa_asing" type="file" name="sertifikat_bahasa_asing">
                        </div>
                    </div>

                    <!-- Kolom Kedua (8 tempat upload file) -->
                    <div>
                        <!-- Tempat upload file 9 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="scan_ktm">Scan KTM</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="scan_ktm" type="file" name="scan_ktm">
                        </div>
                        <!-- Tempat upload file 10 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_keterangan_berkelakuan_baik">Surat Keterangan Berkelakuan Baik</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_keterangan_berkelakuan_baik" type="file" name="surat_keterangan_berkelakuan_baik">
                        </div>
                        <!-- Tempat upload file 11 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_penyataan_mandiri">Surat Pernyataan Mandiri</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_penyataan_mandiri" type="file" name="surat_penyataan_mandiri">
                        </div>
                        <!-- Tempat upload file 12 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_pkkmb">Sertifikat PKKMB</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_pkkmb" type="file" name="sertifikat_pkkmb">
                        </div>
                        <!-- Tempat upload file 13 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_bela_negara">Sertifikat Bela Negara</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_bela_negara" type="file" name="sertifikat_bela_negara">
                        </div>
                        <!-- Tempat upload file 14 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_agent_of_change">Sertifikat Agent of Change</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_agent_of_change" type="file" name="sertifikat_agent_of_change">
                        </div>
                        <!-- Tempat upload file 15 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_berorganisasi">Sertifikat Berorganisasi (Minimal sebagai koordinator)</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_berorganisasi" type="file" name="sertifikat_berorganisasi">
                        </div>
                        <!-- Tempat upload file 16 -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="berita_acara_pemilihan">Berita Acara Pemilihan</label>
                            <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="berita_acara_pemilihan" type="file" name="berita_acara_pemilihan">
                        </div>
                        @error('pdf')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Tombol Previous dan Next -->
            <div class="flex justify-between mt-4">
                <button type="button" class="bg-gradient-to-r from-[#00008B] to-[#3B3BBD] text-white py-2 px-4 rounded-lg shadow-lg font-extrabold transition duration-200 ease-in-out hover:-translate-y-1">Previous</button>
                <button type="submit" class="bg-gradient-to-r from-[#00008B] to-[#3B3BBD] text-white py-2 px-4 rounded-lg shadow-lg font-extrabold transition duration-200 ease-in-out hover:-translate-y-1">Send</button>
            </div>
        </div>
@endsection
