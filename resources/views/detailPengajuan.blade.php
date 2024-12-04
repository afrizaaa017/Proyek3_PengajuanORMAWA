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

    {{-- @extends('components.main')
    @include('components.navbar2') --}}

    @section('content')
    <div class="w-full px-4 py-6 mx-auto" id="content">
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-center font-semibold leading-7 text-gray-900">DATA PENGAJUAN</h3>
            </div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">NAMA</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuans->nama }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">JURUSAN</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $pengajuans['jurusan'] }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">PRODI</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuans['prodi'] }}
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">ORMAWA</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $pengajuans['ormawa'] }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">KETUA</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $pengajuans['ketua_ormawa'] }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">PERIODE</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $pengajuans['periode'] }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">NO.TELEPON</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuans['telp'] }}
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">EMAIL</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $pengajuans['email'] }}
                            </dd>
                        </div>

                    </dl>
                </div>
                <h4 class="text-center font-semibold leading-7 text-gray-900">SCAN KTP</h4>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_scan_ktp.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_surat_sehat.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_surat_rekomendasi_jurusan.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_transkip_rekomendasi_jurusan.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_lkmm.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_pelatihan_kepemimpinan.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_pelatihan_emosional_spiritual.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_bahasa_asing.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_scan_ktm.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_surat_keterangan_berkelakuan_baik.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_surat_penyataan_mandiri.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_pkkmb.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_bela_negara.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_agent_of_change.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_sertifikat_berorganisasi.pdf') }}" width="1000px" height="600px"></iframe>
                <iframe src="{{ asset('laraview/' . $pengajuans->id . '/' .'Pengaju_' . $pengajuans->id . '_berita_acara_pemilihan.pdf') }}" width="1000px" height="600px"></iframe>

            
                <div class="flex justify-between items-center mt-4">
                    <!-- Tombol Revisi -->
                    <button id="btnRevisi" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Revisi
                    </button>
                
                    <!-- Script SweetAlert untuk Revisi -->
                    <script>
                        document.getElementById('btnRevisi').addEventListener('click', function () {
                            Swal.fire({
                                title: 'Revisi Pengajuan',
                                input: 'textarea',
                                inputLabel: 'Masukkan Revisi Pengajuan',
                                inputPlaceholder: 'Tuliskan revisi di sini...',
                                inputAttributes: {
                                    'aria-label': 'Tuliskan revisi di sini'
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Tolak dan Revisi',
                                cancelButtonText: 'Batal',
                                preConfirm: (revisi) => {
                                    if (!revisi) {
                                        Swal.showValidationMessage('Revisi tidak boleh kosong!');
                                    }
                                    return revisi;
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Kirim revisi ke server
                                    fetch("{{ route('pengajuan.updateStatus', ['id' => $pengajuans->id, 'status' => 'Ditolak']) }}", {
                                        method: 'PATCH',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Accept': 'application/json'
                                        },
                                        body: JSON.stringify({ revisi: result.value })
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            Swal.fire('Berhasil!', 'Revisi telah disimpan.', 'success').then(() => {
                                                window.location.href = '/listtable'; // Ganti dengan URL yang sesuai
                                            });
                                        })
                                        .catch(error => {
                                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan revisi.', 'error');
                                        });
                                }
                            });
                        });
                    </script>
                    <form action="{{ route('pengajuan.updateStatus', ['id' => $pengajuans->id, 'status' => 'Diterima']) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <button type="submit" class="btn btn-success bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                            Terima
                        </button>
                    </form>
                    
                </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <!-- Script to handle modal toggle (using Alpine.js) -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
