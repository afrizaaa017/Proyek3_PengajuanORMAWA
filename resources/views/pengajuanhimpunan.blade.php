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
                    <form action="/simpanPengajuan" method="post" enctype="multipart/form-data">
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
                            <div class="col-sm-6">
                                <label for="jurusan" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Jurusan</label>
                                <select name="jurusan" id="jurusan" class="form-select">
                                    <option selected="">Pilih Jurusan</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Kimia">Teknik Kimia</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                </select>
                            </div>

                            <!-- Program Studi -->
                            <div class="col-sm-6">
                                <label for="prodi" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Program Studi</label>
                                <select name="prodi" id="prodi" class="form-select">
                                    <option selected="">Pilih Program Studi</option>
                                    <option value="D3 Informatika">D3 Informatika</option>
                                    <option value="D4 Informatika">D4 Informatika</option>
                                </select>
                            </div>

                            <!-- Ormawa -->
                            <div class="col-sm-6">
                                <label for="ormawa" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Ormawa</label>
                                <select name="ormawa" id="ormawa" class="form-control">
                                    <option value="">--Pilih Ormawa--</option>
                                    @foreach ($Ormawa as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6"> 
                                <select id="BEM&MPM-drowdown" class="form-control"> </select>
                            </div>
                            
                            <div class="col-sm-6"> 
                                <select id="UKM-drowdown" class="form-control"> </select>
                            </div>

                            <div class="col-sm-6"> 
                                <select id="Himpunan-drowdown" class="form-control"> </select>
                            </div>

                            
                            <!-- Periode -->
                            <div class="col-sm-6">
                                <label for="periode" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Periode</label>
                                <select name="periode" id="periode" class="form-select">
                                    <option selected="">Pilih Periode</option>
                                    <option value="2020">2020-2021</option>
                                    <option value="2021">2021-2022</option>
                                    <option value="2022">2022-2023</option>
                                </select>
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
    <script>

        $('#ormawa').on('change', function () {

        var idOrmawa = this.value;

        $("#BEM&MPM-drowdown").html('');

        $.ajax({

            url: "{{url('api/BEM_UKM')}}",

            type: "POST",

            data: {

                id_ormawa: idOrmawa,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (result) {

                $('#BEM&MPM-drowdown').html('<option value="">-- Select State --</option>');

                $.each(result.states, function (key, value) {

                    $("#BEM&MPM-drowdown").append('<option value="' + value

                        .id + '">' + value.name + '</option>');

                });

                $('#BEM&MPM-drowdown').html('<option value="">-- Select City --</option>');

            }

        });

        });
    </script>
</body>
</html>
