<!-- progresTable.blade.php -->
<div class="container mx-auto p-4">
    <!-- Progress Indicator -->
    <div class="flex items-center justify-center mb-8">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">
                ✓
            </div>
            <div class="h-1 w-16 bg-blue-500"></div>
        </div>
        <div class="flex items-center">
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">
                ✓
            </div>
            <div class="h-1 w-16 bg-gray-300"></div>
        </div>
        <div class="flex items-center">
            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-gray-500">
                3
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Nomor Pengajuan</th>
                    <th class="px-4 py-2 text-left">Tanggal Pengajuan</th>
                    <th class="px-4 py-2 text-left">Organisasi Mahasiswa</th>
                    <th class="px-4 py-2 text-left">Status Verifikasi</th>
                    <th class="px-4 py-2 text-left">Waktu Verifikasi</th>
                    <th class="px-4 py-2 text-left">Keterangan Verifikasi</th>
                    <th class="px-4 py-2 text-left">Surat SK</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2">230902</td>
                    <td class="px-4 py-2">12 September 2023</td>
                    <td class="px-4 py-2">Organisasi Mahasiswa</td>
                    <td class="px-4 py-2">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">Disetujui</span>
                    </td>
                    <td class="px-4 py-2">13 September 2023</td>
                    <td class="px-4 py-2">Keterangan verifikasi</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs">Unduh</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>