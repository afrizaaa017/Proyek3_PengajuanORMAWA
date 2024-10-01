<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    </head>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<body>
    @include('components.navbar')
    @include('components.sidebar')

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-blue-800 dark:text-white">Pengajuan Ketua Himpunan</h2>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-10">
                    <div class="sm:col-span-2 lg:col-span-6">
                        <label for="nama" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                    </div>
                    <div class="sm:col-span-2 lg:col-span-6">
                        <label for="NIM" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">NIM</label>
                        <input type="text" name="NIM" id="NIM" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIM Lengkap" required="">
                    </div>
                    <div>
                        <label for="Jurusan" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Jurusan</label>
                        <select id="Jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Masukkan Jurusan Anda</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Kimia">Teknik Kimia</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Listrik">Teknik Listrik</option>
                        </select>
                    </div>
                    <div>
                        <label for="Prodi" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Program Studi</label>
                        <select id="Prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Masukkan Program Studi anada</option>
                            <option value="D3 Informatika">D3 Informatika</option>
                            <option value="D4 Informatika">D4 Informatika</option>
                            <option value="D4 Analisis Kimia">D4 Analisis Kimia</option>
                            <option value="D3 Analisis Kimia">D3 Analisis Kimia</option>
                        </select>
                    </div>
                    <div>
                        <label for="Ormawa" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Organisasi Mahasiswa</label>
                        <select id="Ormawa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Masukkan Organisasi anda  nada</option>
                            <option value="himakom">HIMAKOM</option>
                            <option value="himajas">HIMAJAS</option>
                            <option value="HIMATEL">HIMATEL</option>
                            <option value="HMM">HMM</option>
                        </select>
                    </div>
                <div>
                    <label for="periode" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Periode</label>
                    <select id="periode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Masukkan Organisasi anda  nada</option>
                        <option value="2020">2020-2021</option>
                        <option value="2021">2021-2022</option>
                        <option value="2022">2022-2023</option>
                        <option value="2023">2023-2024</option>
                    </select>
                </div>
                    <div class="w-full">
                        <label for="notelepon" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">No.Telepon</label>
                        <input type="text" name="notelepon" id="notelepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nomor Telepon Anda" required="">
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Email</label>
                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Email Polban" required="">
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-800 border border-blue-800 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-blue-800">
                            <path stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Next
                    </button>
                </div>
            </form>
        </div>
      </section>
</body>
</html>
