<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Pengajuan Ketua ORMAWA</title>
</head>

@extends('components.main')
@include('components.navbar2')

@section('content')
<div class="w-full px-4 py-6 mx-auto" id="content">
    <div>
        <div class="px-4 sm:px-0">
            <h3 class="text-center font-semibold leading-7 text-gray-900">DATA PENGAJUAN</h3>
        </div>
        @foreach ($pengajuans as $pengajuan)
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">NAMA</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan['nama'] }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">JURUSAN</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $pengajuan['jurusan'] }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">PRODI</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan['prodi'] }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">ORMAWA</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $pengajuan['ormawa'] }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">KETUA</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $pengajuan['ketua_ormawa'] }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">PERIODE</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $pengajuan['periode'] }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">NO.TELEPON</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan['telp'] }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">EMAIL</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuan['email'] }}
                        </dd>
                    </div>

                </dl>
            </div>
            <h4 class="text-center font-semibold leading-7 text-gray-900">SCAN KTP</h4>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'scan_ktp.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'surat_sehat.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'surat_rekomendasi_jurusan.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'transkip_rekomendasi_jurusan.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_lkmm.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_pelatihan_kepemimpinan.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_pelatihan_emosional_spiritual.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_bahasa_asing.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'scan_ktm.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'surat_keterangan_berkelakuan_baik.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'surat_penyataan_mandiri.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_pkkmb.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_bela_negara.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_agent_of_change.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'sertifikat_berorganisasi.pdf') }}" width="1000px" height="600px"></iframe>
            <iframe src="{{ asset('laraview/' . $pengajuan->id . '/' .$pengajuan->nim . '_' . $pengajuan->nama . '_' . 'berita_acara_pemilihan.pdf') }}" width="1000px" height="600px"></iframe>

            <div class="flex justify-between items-center mt-4">
                <!-- Form untuk menolak pengajuan -->
                <div x-data="{ openModal: false }">
                    <!-- Revisi Button -->
                    <button @click="openModal = true" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Revisi
                    </button>
                
                    <!-- Modal -->
                    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" 
                         x-show="openModal" 
                         x-cloak>
                        <div class="bg-white rounded-lg shadow-lg max-w-md w-full mx-auto">
                            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                                <h5 class="text-lg font-semibold" id="exampleModalLabel">Revisi Pengajuan</h5>
                                <button type="button" @click="openModal = false" class="text-gray-500 hover:text-gray-700">
                                    &times;
                                </button>
                            </div>
                            <form action="{{ isset($pengajuan) ? route('pengajuan.updateStatus', ['id' => $pengajuan->id, 'status' => 'ditolak']) : route('pengajuan.updateStatus') }}" method="POST">
                                @csrf
                                @if (isset($pengajuan))
                                    @method('PATCH')
                                @endif
                            
                                <!-- Hidden input to set the rejection status -->
                                <input type="hidden" name="status" value="ditolak">
                            
                                <div class="p-4">
                                    <div class="mb-4">
                                        <label for="revisi" class="block text-sm font-medium text-gray-700">Revisi Pengajuan</label>
                                        <textarea class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="revisi" rows="3"> </textarea>
                                    </div>
                                </div>
                            
                                <div class="flex justify-end px-4 py-3 border-t border-gray-200">
                                    <button type="button" @click="openModal = false" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                                        Close
                                    </button>
                                    <button type="submit" class="ml-2 px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                        Tolak dan Revisi
                                    </button>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
                
                <!-- Form untuk menerima pengajuan -->
                <form action="{{ route('pengajuan.updateStatus', ['id' => $pengajuan->id, 'status' => 'diterima']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Terima</button>
                </form>
            
            </div>

        @endforeach
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
  <!-- Script to handle modal toggle (using Alpine.js) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
    <script>
        function modal() {
            return {
                openModal: false
            };
        }
</script>
</html>
