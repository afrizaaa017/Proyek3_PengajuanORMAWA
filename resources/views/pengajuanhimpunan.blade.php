
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
    <section class="bg-blue dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-blue-800 dark:text-white">Pengajuan Ketua Himpunan</h2>
            <form action="#">
                <!-- Mengatur Grid Layout 2 kolom -->
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-2">
                    <!-- Nama -->
                    <div class="col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                    </div>

                    <div class="col-span-2">
                        <label for="NIM" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">NIM</label>
                        <input type="text" name="NIM" id="NIM" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIM Lengkap" required="">
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label for="Jurusan" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Jurusan</label>
                        <select id="Jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Kimia">Teknik Kimia</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                        </select>
                    </div>
    
                    <!-- Program Studi -->
                    <div>
                        <label for="Prodi" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Program Studi</label>
                        <select id="Prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Program Studi</option>
                            <option value="D3 Informatika">D3 Informatika</option>
                            <option value="D4 Informatika">D4 Informatika</option>
                        </select>
                    </div>
    
                    <!-- Organisasi Mahasiswa -->
                    <div>
                        <label for="Ormawa" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Ormawa</label>
                        <select id="Ormawa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Ormawa</option>
                            <option value="HIMAKOM">HIMAKOM</option>
                            <option value="HIMATEL">HIMATEL</option>
                        </select>
                    </div>
    
                    <!-- Periode -->
                    <div>
                        <label for="periode" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Periode</label>
                        <select id="periode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Pilih Periode</option>
                            <option value="2020">2020-2021</option>
                            <option value="2021">2021-2022</option>
                            <option value="2022">2022-2023</option>
                        </select>
                    </div>
    
                    <!-- No.Telepon -->
                    <div>
                        <label for="notelepon" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">No.Telepon</label>
                        <input type="text" name="notelepon" id="notelepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nomor Telepon Anda" required="">
                    </div>
    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email Anda" required="">
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
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>