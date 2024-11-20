{{-- <!DOCTYPE html> --}}
<html lang="id">

<head>
    @include('layouts.head')
    <title>Pengajuan Ketua ORMAWA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

@extends('components.main')
@include('components.navbar2')

@section('content')
<div class="w-full px-4 py-6 mx-auto" id="content">
    <!-- Tabel Pengajuan -->
    <div class="relative shadow-md rounded-lg overflow-hidden pb-10 p-5 border border-gray-200 bg-white">
        <div class="w-full">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-[#295F98]">Tabel Pengajuan</h2>
                <div>
                    <label for="periode" class="text-sm mr-2">Periode</label>
                    <select id="periode" class="border border-gray-300 rounded-md p-1 w-32">
                        <option>2020-2021</option>
                        <option>2021-2022</option>
                        <option>2022-2023</option>
                        <option>2023-2024</option>
                    </select>
                </div>
            </div>
            <table class="w-full text-xs text-center text-gray-700">
                <thead class="text-xs uppercase border-b-2 border-gray-200">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">NO</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap text-left">Nama</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Organisasi Mahasiswa</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Tanggal Pengajuan</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Status Verifikasi</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Waktu Verifikasi</th>
                        <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuans as $pengajuan)
                    <tr class="border-b text-center">
                        <td class="px-4 py-3 text-[#295F98]">{{ $pengajuan->id }}</td>
                        <td class="px-4 py-3 text-left text-[#295F98]">{{ $pengajuan->nama }}</td>
                        <td class="px-4 py-3 text-[#295F98]">{{ $pengajuan->ormawa }}</td>
                        <td class="px-4 py-3 text-[#295F98]">{{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('j F Y') }}</td>
                        <td>
                            @if($pengajuan->status === \App\Enums\PengajuanStatus::SedangDiproses)
                                <span class="w-24 h-8 px-3 py-1 bg-gradient-to-r from-[#6C7F9E] to-[#A3B3D3] text-white rounded-lg font-semibold shadow-md">
                                    Diproses
                                </span>
                            @elseif($pengajuan->status === \App\Enums\PengajuanStatus::Diterima)
                                <span class="w-24 h-8 px-3 py-1 bg-gradient-to-r from-[#32BB35] to-[#8BE52E] text-white rounded-lg font-semibold shadow-md">
                                    Diterima
                                </span>
                            @elseif($pengajuan->status === \App\Enums\PengajuanStatus::Ditolak)
                                <span class="w-24 h-8 px-3 py-1 bg-gradient-to-r from-[#E11818] to-[#FF7171] text-white rounded-lg font-semibold shadow-md">
                                    Ditolak
                                </span>
                            @else
                                <span class="w-24 h-8 px-3 py-1 bg-gray-300 text-gray-800 rounded-lg font-semibold shadow-md">
                                    Tidak Diketahui
                                </span>
                            @endif
                        </td>                        
                        <td class="px-4 py-3 text-[#295F98]">{{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('j F Y') }}</td>
                        <td class="px-4 py-3">
                            <a href="detailPengajuan" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
</html>
