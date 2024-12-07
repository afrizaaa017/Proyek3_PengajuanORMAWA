<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/style.css">
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
                        
            <!-- Stepper Container -->
            <div class="flex items-start max-w-4xl mx-auto mt-32">
                <!-- Step 1 (Completed or Active) -->
                <div id="step1" class="w-full">
                    <div class="flex items-center w-full">
                        <div id="circle1" class="w-6 h-6 shrink-0 p-1 flex items-center justify-center rounded-full bg-gray-300">
                            <i class="fas fa-check text-white text-xs hidden"></i>
                        </div>
                        <div id="progressStep1" class="w-56 h-1 mx-2 rounded-lg bg-gray-300"></div>
                    </div>
                    <div class="mt-1">
                        <h6 class="text-sm font-bold text-gray-500" id="textStep1">Pengisian Form</h6>
                        <p class="text-xs text-gradient-orange" id="status1">Completed</p>
                    </div>
                </div>
                
                <!-- Step 2 (Completed or Active) -->
                <div id="step2" class="w-full">
                    <div class="flex items-center w-full">
                        <div id="circle2" class="w-6 h-6 shrink-0 p-1 flex items-center justify-center rounded-full bg-gray-300">
                            <i class="fas fa-check text-white text-xs hidden"></i>
                        </div>
                        <div class="w-56 h-1 mx-2 rounded-lg bg-gray-300" id="line2"></div>
                    </div>
                    <div class="mt-1">
                        <h6 class="text-sm font-bold text-gray-500">Pengajuan Berkas</h6>
                        <p class="text-xs text-gray-500" id="status2">Pending</p>
                    </div>
                </div>
            
                <!-- Step 3 (Pending) -->
                <div id="step3" class="w-full">
                    <div class="flex items-center">
                        <div id="circle3" class="w-6 h-6 shrink-0 p-1 flex items-center justify-center rounded-full bg-gray-300">
                                <i class="fas fa-check text-white text-xs hidden"></i>
                        </div>
                        <span class="text-xs text-white font-bold" id="line3"></span>
                    </div>
                    <div class="mt-1">
                        <h6 class="text-sm font-bold text-gray-500">Verifikasi Berkas</h6>
                        <p class="text-xs text-gray-500" id="status3">Pending</p>
                    </div>
                </div>
            </div>
            <!-- End of Stepper Container -->
            

            <section class="bg-blue dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto">
                    <h3 class="mb-4 text-xl font-bold text-blue-800 dark:text-white text-center">  </h2>
                    <form action="{{ route('form.simpanPengajuan') }}" method="post" enctype="multipart/form-data" id="applicationForm">
                        @csrf
                        <!-- Mengatur Grid Layout 2 kolom -->
                        <div class="row g-4">
                            <!-- Nama -->
                            <div class="col-12" >
                                <label for="nama" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" required="" value="{{ old('nama', session('pengajuan')['nama'] ?? '') }}">
                            </div>

                            <!-- NIM -->
                            <div class="col-12" >
                                <label for="nim" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM Lengkap" required="" value="{{ old('nim', session('pengajuan')['nim'] ?? '') }}">
                                @if ($errors->has('nim'))
                                    <div class="text-red-500">
                                        {{ $errors->first('nim') }}
                                    </div>
                                @endif
                            </div>
                            <!-- Jurusan -->
                            <div class="col-xl-12" >
                                <label for="jurusan" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Pilih Jurusan:</label>
                                <select id="jurusan" name="jurusan" class="form-select">
                                    <option value="">--Pilih Jurusan--</option>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->nama_jurusan }}"
                                            {{ old('jurusan', session('pengajuan')['jurusan'] ?? '') == $jurusan->nama_jurusan ? 'selected' : '' }}
                                            data-id="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Prodi -->
                            <div class="col-xl-12">
                                <label for="prodi" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Pilih Prodi:</label>
                                <select id="prodi" name="prodi" class="form-select">
                                    <option value="">--Pilih Prodi--</option>
                                    @foreach($prodis as $prodi)
                                        <option value="{{ $prodi->nama_prodi }}" 
                                            {{ old('prodi', session('pengajuan')['prodi'] ?? '') == $prodi->nama_prodi ? 'selected' : '' }}
                                            data-id="{{ $prodi->id_prodi }}">{{ $prodi->nama_prodi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Periode -->
                            <div class="col-xl-12">
                                <label for="periode" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Periode</label>
                                <select name="periode" id="periode" class="form-select">
                                    <option value="" disabled selected>Pilih Periode</option>
                                    <option value="2020-2021" {{ old('periode', session('pengajuan')['periode'] ?? '') == '2020-2021' ? 'selected' : '' }}>2020-2021</option>
                                    <option value="2021-2022" {{ old('periode', session('pengajuan')['periode'] ?? '') == '2021-2022' ? 'selected' : '' }}>2021-2022</option>
                                    <option value="2022-2023" {{ old('periode', session('pengajuan')['periode'] ?? '') == '2022-2023' ? 'selected' : '' }}>2022-2023</option>
                                </select>
                            </div>
                            
                            <div class="col-xl-12">
                                <label for="ormawa" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Ormawa</label>
                                <select id="ormawa" name="ormawa" class="form-select">
                                    <option value="">--Pilih Ormawa--</option>
                                    @foreach($ormawas as $ormawa)
                                        <option value="{{ $ormawa->nama_ormawa }}" 
                                            {{ old('ormawa', session('pengajuan')['ormawa'] ?? '') == $ormawa->nama_ormawa ? 'selected' : '' }}
                                            data-id="{{ $ormawa->id_ormawa }}">{{ $ormawa->nama_ormawa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Ketua_ormawa -->
                            <div class="col-xl-12">
                                <div class="col-xl-12">
                                    <label for="ketua_ormawa" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Pilih ketua ormawa:</label>
                                    <select id="ketua_ormawa" name="ketua_ormawa" class="form-select"> <!-- Ganti 'prodi' menjadi 'ketua_ormawa' -->
                                        <option value="">--Pilih Ketua Ormawa--</option>
                                        @foreach($ketuaOrmawas as $kt)
                                            <option value="{{ $kt->nama_ketua }}" 
                                                {{ old('ketua_ormawa', session('pengajuan')['ketua_ormawa'] ?? '') == $kt->nama_ketua ? 'selected' : '' }}
                                                data-id="{{ $kt->id_ketua_ormawa }}">{{ $kt->nama_ketua }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- No. Telepon -->
                            <div class="col-sm-6">
                                <label for="telp" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">No.Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control" placeholder="Nomor Telepon Anda" required="" value="{{ old('telp', session('pengajuan')['telp'] ?? '') }}">
                            </div>

                            <!-- Email -->
                            <div class="col-sm-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-blue-800 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Anda" required="" value="{{ old('email', session('pengajuan')['email'] ?? '') }}">
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
    <script>
         document.addEventListener("DOMContentLoaded", function() {
            const step1Circle = document.getElementById("circle1");
            const step1StatusText = document.getElementById("status1");
            const step1TitleText = document.getElementById("textStep1");
            const progressStep = document.getElementById("progressStep1");
            const form = document.getElementById("applicationForm");
            const formFields = form.querySelectorAll("input, select, textarea");  // Select all input, select, and textarea elements

            function checkStep1Completion() {
                let isCompleted = true;
                
                formFields.forEach(field => {
                    if (field.type !== "submit" && field.value.trim() === "") {
                        isCompleted = false;
                    }
                });
                
                if (isCompleted) {
                    // Update Step 1 as completed
                    step1Circle.classList.replace("bg-gray-300", "bg-gradient-orange");
                    step1Circle.querySelector("i").classList.remove("hidden");
                    step1StatusText.textContent = "Completed";
                    step1TitleText.classList.replace("text-gray-500", "text-gradient-orange");
                    step1StatusText.classList.replace("text-gray-500", "text-gradient-orange");
                    progressStep.classList.replace('bg-gray-300','line-gradient-blue')
                } else {
                    // Revert Step 1 to pending
                    step1Circle.classList.replace("bg-gradient-orange", "bg-gray-300");
                    step1Circle.querySelector("i").classList.add("hidden");
                    step1StatusText.textContent = "Pending";
                    step1TitleText.classList.replace("text-gradient-orange", "text-gray-500");
                    step1StatusText.classList.replace("text-gradient-orange", "text-gray-500");
                    progressStep.classList.replace('line-gradient-blue','bg-gray-300')
                }
            }

            // Attach event listeners to all form fields for real-time status updates
            formFields.forEach(field => {
                field.addEventListener("input", checkStep1Completion);
                field.addEventListener("change", checkStep1Completion); // for select fields
            });

            // Initial check on load
            checkStep1Completion();
        });
    </script>

</body>

</html>
