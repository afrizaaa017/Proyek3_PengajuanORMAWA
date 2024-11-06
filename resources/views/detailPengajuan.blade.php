<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<body>
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
                <form action="{{ route('pengajuan.updateStatus', ['id' => $pengajuan->id, 'status' => 'ditolak']) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Tolak</button>
                </form>
                
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
</body>

</html>
