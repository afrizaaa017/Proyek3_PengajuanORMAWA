@extends('components.main')
@include('layouts.head')
@include('components.navbar2')

@section('content')
    <div class="w-full px-4 py-6 mx-auto" id="content">

        <!-- Konten Upload Berkas -->
        <form action="{{ route('surat.update', ['id' => $pengajuan->id, 'nim' => $pengajuan->nim]) }}" method="POST" enctype="multipart/form-data" id="applicationForm">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            
            <div class="container mx-auto mt-10 flex-1">
                <div class="grid grid-cols-3 gap-8">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_pernyataan">Surat Penyataan Pengajuan</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light transition duration-200 ease-in-out hover:-translate-y-1" id="surat_pernyataan" type="file" name="surat_pernyataan" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_perjanjian">Surat Perjanjian</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light transition duration-200 ease-in-out hover:-translate-y-1" id="surat_perjanjian" type="file" name="surat_perjanjian" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-extrabold text-[#295F98]" for="surat_mou">Surat MOU</label>
                        <input class="block w-full text-sm text-gray-900 cursor-pointer bg-white border-2 border-dashed border-[#FF9A36] rounded-md p-2 font-light transition duration-200 ease-in-out hover:-translate-y-1" id="surat_mou" type="file" name="surat_mou" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-4">
            <button type="button" id="submitBtn" class="w-full h-11 bg-gradient-to-r from-[#00008B] to-[#3B3BBD] text-white py-2 px-4 rounded-lg shadow-lg font-extrabold transition duration-200 ease-in-out hover:-translate-y-1">Send</button>
        </div>
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            Swal.fire({
                title: 'Yakin data sudah benar?',
                text: "Pastikan semua data telah diisi dengan benar sebelum mengirimkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Cek Lagi',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika user yakin
                    document.getElementById('applicationForm').submit();
                }
            });
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
