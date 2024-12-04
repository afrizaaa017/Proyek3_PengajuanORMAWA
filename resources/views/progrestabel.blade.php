<head>
    @include('layouts.head')
    <title>Pengajuan Ketua ORMAWA</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

@extends('components.main')
@include('components.navbar2')

@section('content')
<div class="w-full px-4 py-6 mx-auto" id="content">
    <div class="relative shadow-md rounded-lg overflow-hidden pb-10 p-5 border border-gray-200 bg-white">
        <h2 class="text-xl font-bold text-[#295F98]">Progress Pengajuan</h2>
        <div class="overflow-x-auto mt-5">
            <table class="w-full text-xs text-left text-gray-700">
                <thead class="text-xs uppercase border-b-2 border-gray-200">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Nomor Pengajuan</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Tanggal Pengajuan</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Organisasi Mahasiswa</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Status Verifikasi</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Waktu Verifikasi</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Keterangan Verifikasi</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Surat SK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3 text-[#295F98]">Nomor Pengajuan</td>
                        <td class="px-4 py-3 text-[#295F98]">DD/MM/YYYY</td>
                        <td class="px-4 py-3 text-[#295F98]">HIMAKOM</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-[#FF5C5C] text-white rounded-lg font-semibold">Ditolak</span>
                        </td>
                        <td class="px-4 py-3 text-[#295F98]">HH:MM</td>
                        <td class="px-4 py-3">
                            <button class="px-3 py-1 bg-[#FFC107] text-white rounded-lg font-semibold">Revisi</button>
                        </td>
                        <td class="px-4 py-3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
