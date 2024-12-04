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
        <form action="{{ route('berkas.update', ['id' => $pengajuans->id]) }}" method="POST" enctype="multipart/form-data" id="applicationForm">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            
            <div class="container mx-auto mt-10 flex-1">
                <div class="grid grid-cols-2 gap-8">

                <!-- Kolom Pertama (8 tempat upload file) -->
                <div>
                    <!-- Tempat upload file 1 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="scan_ktp">Scan KTP</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="scan_ktp" type="file" name="scan_ktp">
                        <!-- Tampilkan file yang sudah diupload -->
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_scan_ktp.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_scan_ktp.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Scan KTP sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 2 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_sehat">Surat Sehat</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_sehat" type="file" name="surat_sehat">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_sehat.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_sehat.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Surat Sehat sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 3 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_rekomendasi_jurusan">Surat Rekomendasi Jurusan</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_rekomendasi_jurusan" type="file" name="surat_rekomendasi_jurusan">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_rekomendasi_jurusan.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_rekomendasi_jurusan.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Surat Rekomendasi Jurusan sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 4 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="transkip_rekomendasi_jurusan">Transkip Akademik Semester Terakhir</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="transkip_rekomendasi_jurusan" type="file" name="transkip_rekomendasi_jurusan">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_transkip_rekomendasi_jurusan.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_transkip_rekomendasi_jurusan.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Transkip Akademik Semester Terakhir sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 5 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_lkmm">Sertifikat LKMM</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_lkmm" type="file" name="sertifikat_lkmm">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_lkmm.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_lkmm.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat LKMM sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 6 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_pelatihan_kepemimpinan">Sertifikat Pelatihan Kepemimpinan</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_pelatihan_kepemimpinan" type="file" name="sertifikat_pelatihan_kepemimpinan">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_pelatihan_kepemimpinan.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_pelatihan_kepemimpinan.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat Pelatihan Kepemimpinan sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 7 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_pelatihan_emosional_spiritual">Sertifikat Pelatihan Emosional Spiritual bagi Mahasiswa</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_pelatihan_emosional_spiritual" type="file" name="sertifikat_pelatihan_emosional_spiritual">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_pelatihan_emosional_spiritual.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_pelatihan_emosional_spiritual.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat Pelatihan Emosional Spiritual sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 8 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_bahasa_asing">Sertifikat Bahasa Asing</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_bahasa_asing" type="file" name="sertifikat_bahasa_asing">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_bahasa_asing.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_bahasa_asing.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat Bahasa Asing sebelumnya
                                </button>
                            </div>
                        @endif
                    </div> 
                </div>

                <!-- Kolom Kedua (8 tempat upload file) -->
                <div>
                    <!-- Tempat upload file 9 -->
                     <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="scan_ktm">Scan KTM</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="scan_ktm" type="file" name="scan_ktm">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_scan_ktm.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_scan_ktm.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Scan KTM sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 10 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_keterangan_berkelakuan_baik">Surat Keterangan Berkelakuan Baik</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_keterangan_berkelakuan_baik" type="file" name="surat_keterangan_berkelakuan_baik">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_keterangan_berkelakuan_baik.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_keterangan_berkelakuan_baik.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Surat Keterangan Berkelakuan Baik sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 11 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_penyataan_mandiri">Surat Pernyataan Mandiri</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="surat_penyataan_mandiri" type="file" name="surat_penyataan_mandiri">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_penyataan_mandiri.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_surat_penyataan_mandiri.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Surat Pernyataan Mandiri sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 12 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_pkkmb">Sertifikat PKKMB</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_pkkmb" type="file" name="sertifikat_pkkmb">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_pkkmb.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_pkkmb.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat PKKMB sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 13 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_bela_negara">Sertifikat Bela Negara</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_bela_negara" type="file" name="sertifikat_bela_negara">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_bela_negara.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_bela_negara.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat Bela Negara sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 14 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_agent_of_change">Sertifikat Agent of Change</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_agent_of_change" type="file" name="sertifikat_agent_of_change">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_agent_of_change.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_agent_of_change.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat Agent of Change sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 15 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="sertifikat_berorganisasi">Sertifikat Berorganisasi (Minimal sebagai koordinator)</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="sertifikat_berorganisasi" type="file" name="sertifikat_berorganisasi">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_berorganisasi.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_sertifikat_berorganisasi.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Sertifikat Berorganisasi sebelumnya
                                </button>
                            </div>
                        @endif
                    </div>
                    <!-- Tempat upload file 16 -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="berita_acara_pemilihan">Berita Acara Pemilihan</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light text-[#FF9A36] transition duration-200 ease-in-out hover:-translate-y-1" id="berita_acara_pemilihan" type="file" name="berita_acara_pemilihan">
                        @if('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_berita_acara_pemilihan.pdf')
                            <div class="mt-2 text-sm">
                                <button 
                                    data-file="{{ asset('laraview/' . $pengajuans->id . '/' . 'Pengaju_'. $pengajuans->id . '_berita_acara_pemilihan.pdf') }}" 
                                    class="preview-btn text-blue-600">
                                    Lihat file Berita Acara Pemilihan sebelumnya
                                </button>
                            </div>
                        @endif
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

    <script>
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
                showCloseButton: true,
                showConfirmButton: false,
                width: '80%',
                animation: false
            });
        }
    });

 </script>

    
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
