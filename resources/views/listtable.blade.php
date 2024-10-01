
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<body>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden pb-10">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-[#295F98]">Nomor Pengajuan</th>
                                <th scope="col" class="px-4 py-3 text-[#295F98]">Tanggal Pengajuan</th>
                                <th scope="col" class="px-4 py-3 text-[#295F98]">ORganisasi Mahasiswa</th>
                                <th scope="col" class="px-4 py-3 text-[#295F98]">Status Verifikasi</th>
                                <th scope="col" class="px-4 py-3 text-[#295F98]">Waktu Verifikasi</th>
                                <th scope="col" class="px-4 py-3 text-[#295F98]">Keterangan Verifikasi</th>
                                <th scope="col" class="px-4 py-3 text-[#295F98] text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">001</th>
                                <td class="px-4 py-3">30 September 2024</td>
                                <td class="px-4 py-3">HIMAKOM</td>
                                <td class="px-4 w-10 bg-gray-400 text-white font-bold  px-4 rounded-lg shadow-md active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300">Perlu Diproses</td>
                                <td class="px-4 py-3"> - </td>
                                <td class="px-4 py-3"> - </td>
                                <td class="px-4 py-3"><a href="/review" class=" bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-300 transition duration-300">
                                    Aksi
                                  </a></td>
                            </tr>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">001</th>
                                <td class="px-4 py-3">30 September 2024</td>
                                <td class="px-4 py-3">HIMAKOM</td>
                                <td class="px-4 w-10 bg-red-400 text-white font-bold  px-4 rounded-lg shadow-md active:bg-red-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300">Diproses</td>
                                <td class="px-4 py-3">2 Oktober 2024</td>
                                <td class="px-4 w-8 bg-orange-600 text-white font-bold  px-4 rounded-lg shadow-md active:bg-red-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300">Revisi</td>
                                <td class="px-4 py-3"><text class="w-8 bg-gray-500 text-white font-bold py-2 px-4 rounded-lg shadow-md ">Aksi</text></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </section>
</body>
</html>


