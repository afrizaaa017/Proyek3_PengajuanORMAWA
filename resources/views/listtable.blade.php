{{-- <!DOCTYPE html> --}}
<html lang="id">

<head>
    <title>Pengajuan Ketua ORMAWA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <main class="ease-soft-in-out flex justify-center items-center h-screen rounded-xl transition-all duration-200 p-6">
        <!-- Tabel Pengajuan -->
        <div class="relative shadow-md rounded-lg overflow-hidden pb-10 p-5 border border-gray-200 bg-white m-6">
            <div class="overflow-x-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-[#295F98]">Tabel Pengajuan</h2>
                    <div>
                        <label for="periode" class="text-sm mr-2">Periode</label>
                        <select id="periode" class="border border-gray-300 rounded-md p-1">
                            <option>2020-2021</option>
                            <option>2021-2022</option>
                            <option>2022-2023</option>
                            <option>2023-2024</option>
                        </select>
                    </div>
                </div>
                <table class="w-full text-xs text-left text-gray-700">
                    <thead class="text-xs uppercase border-b-2 border-gray-200">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Nomor Pengajuan</th>
                            <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Tanggal Pengajuan</th>
                            <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Organisasi Mahasiswa</th>
                            <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Status Verifikasi</th>
                            <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Waktu Verifikasi</th>
                            <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Keterangan Verifikasi</th>
                            <th scope="col" class="px-4 py-3 text-[#295F98] whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row with status "Diproses" -->
                        <tr class="border-b">
                            <td class="px-4 py-3 text-[#295F98]">Nomor Pengajuan</td>
                            <td class="px-4 py-3 text-[#295F98]">DD/MM/YYYY</td>
                            <td class="px-4 py-3 text-[#295F98]">Organisasi Mahasiswa</td>
                            <td class="px-4 py-3">
                                <span class="w-24 h-8 px-3 py-1 bg-gray-400 text-white rounded-lg font-semibold">Diproses</span>
                            </td>
                            <td class="px-4 py-3 text-[#295F98]">HH:MM DD/MM/YYYY</td>
                            <td class="px-4 py-3"></td>
                            <td class="px-4 py-3">
                                <button class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Example row with status "Ditolak" -->
                        <tr class="border-b">
                            <td class="px-4 py-3 text-[#295F98]">Nomor Pengajuan</td>
                            <td class="px-4 py-3 text-[#295F98]">DD/MM/YYYY</td>
                            <td class="px-4 py-3 text-[#295F98]">Organisasi Mahasiswa</td>
                            <td class="px-4 py-3">
                                <span class="w-24 h-8 px-3 py-1 bg-[#FF5C5C] text-white rounded-lg font-semibold">Ditolak</span>
                            </td>
                            <td class="px-4 py-3 text-[#295F98]">HH:MM DD/MM/YYYY</td>
                            <td class="px-4 py-3">
                                <button class="px-3 py-1 bg-[#FFC107] text-white rounded-lg font-semibold">Revisi</button>
                            </td>
                            <td class="px-4 py-3">
                                <button class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Example row with status "Diterima" -->
                        <tr class="border-b">
                            <td class="px-4 py-3 text-[#295F98]">Nomor Pengajuan</td>
                            <td class="px-4 py-3 text-[#295F98]">DD/MM/YYYY</td>
                            <td class="px-4 py-3 text-[#295F98]">Organisasi Mahasiswa</td>
                            <td class="px-4 py-3">
                                <span class="w-24 h-8 px-3 py-1 bg-yellow-400 text-white rounded-lg font-semibold">Diterima</span>
                            </td>
                            <td class="px-4 py-3 text-[#295F98]">HH:MM DD/MM/YYYY</td>
                            <td class="px-4 py-3"></td>
                            <td class="px-4 py-3">
                                <button class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-3 text-[#295F98]">Nomor Pengajuan</td>
                                <td class="px-4 py-3 text-[#295F98]">DD/MM/YYYY</td>
                                <td class="px-4 py-3 text-[#295F98]">Organisasi Mahasiswa</td>
                                <td class="px-4 py-3">
                                    <span class="w-24 h-8 px-3 py-1 bg-[#FF5C5C] text-white rounded-lg font-semibold">Ditolak</span>
                                </td>
                                <td class="px-4 py-3 text-[#295F98]">HH:MM DD/MM/YYYY</td>
                                <td class="px-4 py-3">
                                    <button class="px-3 py-1 bg-[#FFC107] text-white rounded-lg font-semibold">Revisi</button>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-3 text-[#295F98]">Nomor Pengajuan</td>
                                <td class="px-4 py-3 text-[#295F98]">DD/MM/YYYY</td>
                                <td class="px-4 py-3 text-[#295F98]">Organisasi Mahasiswa</td>
                                <td class="px-4 py-3">
                                    <span class="w-24 h-8 px-3 py-1 bg-[#FF5C5C] text-white rounded-lg font-semibold">Ditolak</span>
                                </td>
                                <td class="px-4 py-3 text-[#295F98]">HH:MM DD/MM/YYYY</td>
                                <td class="px-4 py-3">
                                    <button class="px-3 py-1 bg-[#FFC107] text-white rounded-lg font-semibold">Revisi</button>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
 
        </div>
        <!-- end cards -->
    </main>
 
</body>

</html>
