@extends('components.main')
@include('layouts.head')
@include('components.navbar2')

@section('content')
<div class=" w-full px-4 py-6 mx-auto" id="content">
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
                        @foreach ($pengajuans as $pengajuan)
                        <tr class="border-b">
                            <td class="px-4 py-3 text-[#295F98]">{{ $pengajuan->id }}</td>
                            <td class="px-4 py-3 text-[#295F98]">{{ $pengajuan->created_at->format('Y-m-d') }}</td>
                            <td class="px-4 py-3 text-[#295F98]">{{ $pengajuan->jurusan }}</td>
                            <td class="px-4 py-3">
                                {{-- <span class="px-3 py-1 {{ $pengajuan->status === \App\Enums\PengajuanStatus::PerluRevisi ? 'bg-[#FF5C5C]' : 'bg-[#4CAF50]' }} text-white rounded-lg font-semibold">
                                    {{ $pengajuan->status }}
                                </span> --}}
                                <span class="w-24 h-8 px-3 py-1 {{ $pengajuan->status === \App\Enums\PengajuanStatus::PerluRevisi ? 'bg-gradient-to-r from-[#E11818] to-[#FF7171]' : 'bg-gradient-to-r from-[#32BB35] to-[#8BE52E]' }} text-white rounded-lg font-semibold shadow-md">
                                    {{ $pengajuan->status }}
                                </span>
                                {{-- @if($pengajuan->status === \App\Enums\PengajuanStatus::MenungguVerifikasi)
                                <span class="w-24 h-8 px-3 py-1 bg-gradient-to-r from-[#6C7F9E] to-[#A3B3D3] text-white rounded-lg font-semibold shadow-md">
                                    Menunggu Verifikasi
                                </span>
                                @elseif($pengajuan->status === \App\Enums\PengajuanStatus::Diterima)
                                    <span class="w-24 h-8 px-3 py-1 bg-gradient-to-r from-[#32BB35] to-[#8BE52E] text-white rounded-lg font-semibold shadow-md">
                                        Diterima
                                    </span>
                                @elseif($pengajuan->status === \App\Enums\PengajuanStatus::PerluRevisi)
                                    <span class="w-24 h-8 px-3 py-1 bg-gradient-to-r from-[#E11818] to-[#FF7171] text-white rounded-lg font-semibold shadow-md">
                                        Perlu Revisi
                                    </span>
                                @elseif($pengajuan->status === \App\Enums\PengajuanStatus::MenungguVerifikasiUlang)
                                    <span class="w-24 h-8 px-3 py-1 bg-gradient-to-r from-[#6C7F9E] to-[#A3B3D3] text-white rounded-lg font-semibold shadow-md">
                                        Menunggu Verifikasi Ulang
                                    </span>
                                @else
                                    <span class="w-24 h-8 px-3 py-1 bg-gray-300 text-gray-800 rounded-lg font-semibold shadow-md">
                                        Tidak Diketahui
                                    </span>
                                @endif --}}
                            </td>
                            <td class="px-4 py-3 text-[#295F98]">
                                @if ($pengajuan->status === \App\Enums\PengajuanStatus::MenungguVerifikasi)
                                    <p class="text-center font-extrabold text-sm md:text-base">-</p>
                                @elseif ($pengajuan->status === \App\Enums\PengajuanStatus::PerluRevisi || $pengajuan->status === \App\Enums\PengajuanStatus::Diterima)
                                    <p class="text-sm md:text-base">{{ $pengajuan->updated_at->format('Y-m-d') }}</p>
                                @elseif ($pengajuan->status === \App\Enums\PengajuanStatus::MenungguVerifikasi)
                                    <p class="text-center text-xl font-extrabold">-</p>
                                @elseif ($pengajuan->status === \App\Enums\PengajuanStatus::PerluRevisi || $pengajuan->status === \App\Enums\PengajuanStatus::Diterima)
                                    <p>{{ $pengajuan->updated_at->format('Y-m-d') }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($pengajuan->status === \App\Enums\PengajuanStatus::PerluRevisi)
                                <button
                                    class="btn-revisi-pengaju bg-gradient-to-r from-[#FF7F00] to-[#FF9A36] text-white px-3 py-1 rounded-lg shadow-lg font-extrabold transition duration-200 ease-in-out hover:-translate-y-1"
                                    data-id="{{ $pengajuan->nama }}"
                                    data-alasan="{{ $pengajuan->keterangan }}"
                                    data-edit-url="{{ route('pengajuan.edit', ['id' => $pengajuan->id]) }}">
                                    Revisi
                                </button>
                                @elseif ($pengajuan->status === \App\Enums\PengajuanStatus::MenungguVerifikasi || $pengajuan->status === \App\Enums\PengajuanStatus::Diterima)
                                    <p class="text-center font-extrabold text-sm md:text-base">-</p>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $filePath = public_path('laraview/SK/' . date('Y') . '_SK.pdf');
                                @endphp
                                @if ($pengajuan->status === \App\Enums\PengajuanStatus::Diterima && file_exists($filePath))
                                    <div class="mt-2 text-sm">
                                        <button
                                            data-file="{{ asset('laraview/SK/' . date('Y') . '_SK.pdf') }}"
                                            class="preview-btn text-blue-600">
                                            Download SK
                                        </button>
                                    </div>
                                @elseif ($pengajuan->status === \App\Enums\PengajuanStatus::Diterima && !file_exists($filePath))
                                    <div class="mt-2 text-sm text-gray-500">
                                        Tunggu Semua Pengajuan Diterima.
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Tombol Print  -->
                <div class="mt-4 flex space-x-4 justify-center">
                    <a href="{{ route('surat.pernyataan') }}" class="inline-block px-4 py-2 text-sm font-semibold text-white bg-[#295F98] rounded-lg shadow-md hover:bg-[#183d64]">
                        Unduh Surat Pernyataan
                    </a>
                    <a href="{{ route('surat.perjanjian') }}" class="inline-block px-4 py-2 text-sm font-semibold text-white bg-[#295F98] rounded-lg shadow-md hover:bg-[#183d64]">
                        Unduh Surat Perjanjian
                    </a>
                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('.btn-revisi-pengaju').forEach(button => {
                button.addEventListener('click', function () {
                    const pengajuanId = this.getAttribute('data-id');
                    const alasanRevisi = this.getAttribute('data-alasan');
                    const editUrl = this.getAttribute('data-edit-url');

                    Swal.fire({
                        title: `Pesan Revisi Untuk Pengajuan Dengan Nama ${pengajuanId}`,
                        text: alasanRevisi ? `Revisi: ${alasanRevisi}` : 'Tidak ada revisi, hubungi pihak staff.',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Tutup',
                        cancelButtonText: 'Lakukan Revisi',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.cancel) {
                            window.location.href = editUrl;
                        }
                    });
                });
            });

            document.querySelectorAll('.preview-btn').forEach(button => {
                button.replaceWith(button.cloneNode(true));
            });

            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('preview-btn')) {
                    event.preventDefault();

                    const fileUrl = event.target.getAttribute('data-file');
                    Swal.fire({
                        title: 'Preview PDF',
                        html: `
                            <div style="height: 500px; overflow: auto;">
                                <iframe src="${fileUrl}" width="100%" height="500px"></iframe>
                            </div>
                        `,
                        showCancelButton: true,
                        confirmButtonText: false,
                        width: '80%',
                        animation: false
                    });
                }
            });

        </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </div>
        @endsection
