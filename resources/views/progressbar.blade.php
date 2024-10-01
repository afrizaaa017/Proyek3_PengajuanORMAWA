<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Stepper Component with Gradient Text using Tailwind CSS">
    <title>Stepper Component with Gradient Text</title>
    <!-- Tambahkan link CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan link ke ikon FontAwesome untuk ceklis -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Definisikan gradasi warna oranye untuk step yang complete */
        .bg-gradient-orange {
            background: linear-gradient(90deg, #FF7F00, #FF9A36); /* Gradasi oranye */
        }

        /* Tambahkan gradasi biru pada garis penghubung */
        .line-gradient-blue {
            background: linear-gradient(90deg, #00008B 0%, #295F98 100%); /* Gradasi biru untuk garis */
        }

        /* Definisikan gradasi pada teks untuk step yang complete */
        .text-gradient-orange {
            background: linear-gradient(90deg, #FF7F00, #FF9A36); /* Gradasi oranye pada teks */
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent; /* Ini akan menghilangkan warna teks default */
        }

        /* Warna teks abu-abu untuk step yang belum complete */
        .text-gray-pending {
            color: #A0AEC0; /* Warna abu-abu untuk teks pending */
        }
    </style>
</head>
<body class="bg-gray-50 flex justify-center items-center h-screen">

<!-- Stepper Container -->
<div class="flex items-start max-w-screen-xl mx-auto">
  <!-- Step 1 (Completed) -->
  <div class="w-full">
    <div class="flex items-center w-full">
      <!-- Lingkaran dengan warna gradasi oranye -->
      <div class="w-8 h-8 shrink-0 mx-[-1px] p-1.5 flex items-center justify-center rounded-full bg-gradient-orange">
        <!-- Gunakan ikon ceklis -->
        <i class="fas fa-check text-white"></i>
      </div>
      <!-- Garis penghubung dengan warna gradasi biru -->
      <div class="w-[200px] h-1 mx-4 rounded-lg line-gradient-blue"></div>
    </div>
    <div class="mt-2 mr-4">
      <!-- Teks dengan warna gradasi oranye -->
      <h6 class="text-base font-bold text-gradient-orange">Pengisian Form</h6>
      <p class="text-xs text-gradient-orange">Completed</p>
    </div>
  </div>
  
  <!-- Step 2 (Completed) -->
  <div class="w-full">
    <div class="flex items-center w-full">
      <!-- Lingkaran dengan warna gradasi oranye -->
      <div class="w-8 h-8 shrink-0 mx-[-1px] p-1.5 flex items-center justify-center rounded-full bg-gradient-orange">
        <!-- Gunakan ikon ceklis -->
        <i class="fas fa-check text-white"></i>
      </div>
      <!-- Garis penghubung dengan warna gradasi biru -->
      <div class="w-[200px] h-1 mx-4 rounded-lg line-gradient-blue"></div>
    </div>
    <div class="mt-2 mr-4">
      <!-- Teks dengan warna gradasi oranye -->
      <h6 class="text-base font-bold text-gradient-orange">Pengajuan Berkas</h6>
      <p class="text-xs text-gradient-orange">Completed</p>
    </div>
  </div>

  <!-- Step 3 (Pending) -->
  <div>
    <div class="flex items-center">
      <div class="w-8 h-8 shrink-0 mx-[-1px] p-1.5 flex items-center justify-center rounded-full bg-gray-300">
        <span class="text-base text-white font-bold">3</span>
      </div>
    </div>
    <div class="mt-2">
      <!-- Ubah teks menjadi abu-abu jika step pending -->
      <h6 class="text-base font-bold text-gray-pending">Verifikasi Berkas</h6>
      <p class="text-xs text-gray-pending">Pending</p>
    </div>
  </div>
</div>
<!-- End of Stepper Container -->

</body>
</html>
