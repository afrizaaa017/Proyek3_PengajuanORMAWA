<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
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

        .btn-gradient-blue {
            background: linear-gradient(to right, white, #0000ff); /* Gradien dari putih ke biru */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px; /* Atur sudut tombol */
            box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1); /* Bayangan tombol */
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'Gilroy Light', sans-serif;
        }

        .btn-gradient-blue:hover {
            background: linear-gradient(to right, white, #000099); /* Gradien sedikit lebih gelap saat hover */
        }

        .form-control {
            width: 100%; /* Ensure form controls are 100% width */
        }

        section {
            margin-top: 10%
            width: 100%; /* Make section width responsive */
            max-width: 600px; /* Maximum width for larger screens */
            margin: auto; /* Center the section */
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">
    @include('components.navbar')
    @include('components.sidebar')

    <div class="w-1/4 p-4 h-screen">
        <!-- Konten Sidebar (kosong) -->
    </div>

    <div class="flex-1 p-5 flex flex-col">
        <!-- Navbar (Kosong) -->
        <div class="p-4 mb-4">
            <!-- Konten Navbar (kosong) -->
        </div>

    <section class="bg-blue dark:bg-gray-900">
        <div class="container my-4">
            <section class="bg-blue dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto">
                    <h3 class="mb-4 text-xl font-bold text-blue-800 dark:text-white text-center">  </h2>
                    <form action="{{ route('form.simpanPengajuan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Mengatur Grid Layout 2 kolom -->
                        <div class="row g-4">
                            <!-- Nama -->
                            <div class="col-12" >
                                <label for="nama" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" required="">
                            </div>

                            <!-- NIM -->
                            <div class="col-12" >
                                <label for="nim" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM Lengkap" required="">
                            </div>
                            <!-- Jurusan -->
                            <div class="col-xl-12" >
                                <label for="jurusan" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Pilih Jurusan:</label>
                                <select id="jurusan" name="jurusan" class="form-select">
                                    <option value="">--Pilih Jurusan--</option>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->nama_jurusan }}" data-id="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Prodi -->
                            <div class="col-xl-12">
                                <label for="prodi" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Pilih Prodi:</label>
                                <select id="prodi" name="prodi" class="form-select">
                                    <option value="">--Pilih Prodi--</option>
                                </select>
                            </div>

                            <!-- Periode -->
                            <div class="col-xl-12">
                                <label for="periode" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Periode</label>
                                <select name="periode" id="periode" class="form-select">
                                    <option selected="">Pilih Periode</option>
                                    <option value="2020">2020-2021</option>
                                    <option value="2021">2021-2022</option>
                                    <option value="2022">2022-2023</option>
                                </select>
                            </div>
                            
                            <div class="col-xl-12">
                                <label for="ormawa" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Ormawa</label>
                                <select id="ormawa" name="ormawa" class="form-select">
                                    <option value="">--Pilih Ormawa--</option>
                                    @foreach($ormawas as $ormawa)
                                        <option value="{{ $ormawa->nama_ormawa }}" data-id="{{ $ormawa->id_ormawa }}">{{ $ormawa->nama_ormawa }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Ketua_ormawa -->
                            <div class="col-xl-12">
                                <div class="col-xl-12">
                                    <label for="ketua_ormawa" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Pilih ketua ormawa:</label>
                                    <select id="ketua_ormawa" name="ketua_ormawa" class="form-select"> <!-- Ganti 'prodi' menjadi 'ketua_ormawa' -->
                                        <option value="">--Pilih Ketua Ormawa--</option>
                                    </select>
                                </div>
                            </div>

                            <!-- No. Telepon -->
                            <div class="col-sm-6">
                                <label for="telp" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">No.Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor Telepon Anda" required="">
                            </div>

                            <!-- Email -->
                            <div class="col-sm-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Anda" required="">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-gradient-blue">Next</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#jurusan').on('change', function () {
                var jurusan_id = $(this).find(':selected').data('id');
                if (jurusan_id) {
                    $.ajax({
                        url: '/getProdi/' + jurusan_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#prodi').empty();
                            $('#prodi').append('<option value="">--Pilih Prodi--</option>');
                            $.each(data, function (key, value) {
                                $('#prodi').append('<option value="' + value.nama_prodi + '">' + value.nama_prodi + '</option>');
                            });
                        }
                    });
                } else {
                    $('#prodi').empty();
                    $('#prodi').append('<option value="">--Pilih Prodi--</option>');
                }
            });
        });
        $(document).ready(function () {
            $('#ormawa').on('change', function () {
                var ormawa_id = $(this).find(':selected').data('id');
                if (ormawa_id) {
                    $.ajax({
                        url: '/getKetuaOrmawa/' + ormawa_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#ketua_ormawa').empty();
                            $('#ketua_ormawa').append('<option value="">--Pilih ketua ormawa--</option>');
                            $.each(data, function (key, value) {
                                $('#ketua_ormawa').append('<option value="' + value.nama_ketua + '">' + value.nama_ketua + '</option>');
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error('Error fetching ketua ormawa:', xhr.responseText);
                        }
                    });
                } else {
                    $('#ketua_ormawa').empty();
                    $('#ketua_ormawa').append('<option value="">--Pilih ketua ormawa--</option>');
                }
            });
        });
    </script>

</body>

</html>
