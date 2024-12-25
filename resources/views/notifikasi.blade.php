<head>
    @include('layouts.head')
    <title>Pengajuan Ketua ORMAWA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

    @extends('components.main')

    @if (auth()->user()->role_id == 'mahasiswa')
        @include('components.navbar2')
    @elseif (auth()->user()->role_id == 'staff_kemahasiswaan')
        @include('components.navbar2staff')
    @endif

    @section('content')
    <div class="w-full px-4 py-6 mx-auto" id="content">
        <!-- Grid dengan Kolom Khusus -->
{{--
        // notifikasi dengan live card saat dipencet akan muncul
        // looping foreach $notifications as $notification --}}

        <h1 class="text-2xl font-bold mb-4 text-black-600">Notifikasi</h1>

        <div class="flex h-screen">
            <!-- Sidebar Notifikasi -->

            <div class="flex h-screen">
                <!-- Sidebar Notifikasi -->
                <div class="w-1/3 bg-gray-100 p-6 overflow-y-auto">
                    <ul class="list-none space-y-4">
                        @foreach ($notifications as $notification)
                            @if ($notification->notifiable_id == auth()->user()->id && $notification->data['role_target'] == 'mahasiswa')
                                <!-- Notifikasi untuk Mahasiswa -->
                                <x-notification-item
                                    :message="$notification->data['message']"
                                    :time="\Carbon\Carbon::parse($notification->created_at)->diffForHumans()"
                                />
                            @elseif (auth()->user()->role_id == 'staff_kemahasiswaan' && $notification->data['role_target'] == 'staff_kemahasiswaan')
                                <!-- Notifikasi untuk Staff -->
                                <x-notification-item
                                    :message="$notification->data['message']"
                                    :time="\Carbon\Carbon::parse($notification->created_at)->diffForHumans()"
                                />
                            @endif
                        @endforeach

                    </ul>
                </div>

            <div>
                @foreach ($notifications as $notification)
                    {{-- @if (auth()->user()->role_id == 'mahasiswa') --}}
                    @if ($notification->notifiable_id == auth()->user()->id && $notification->data['role_target'] == 'mahasiswa')
                        <!-- Notifikasi untuk Mahasiswa -->
                        @if ($notification->data['role_target'] == 'mahasiswa')
                        <li class="list-group-item">
                            <strong>{{ $notification->data['message'] }}</strong>
                            <small>{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                        </li>
                        @endif
                    @elseif (auth()->user()->role_id == 'staff_kemahasiswaan')
                    <!-- Notifikasi untuk Staff -->
                        @if ($notification->data['role_target'] == 'staff_kemahasiswaan')
                        <li class="list-group-item">
                            <strong>{{ $notification->data['message'] }}</strong>
                            <small>{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                        </li>
                        @endif
                    @endif
                @endforeach
            </div>



        <!-- Live View Card -->
        <div id="live-card" class="w-2/3 bg-gray-50 p-6 hidden">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 id="live-title" class="text-xl font-semibold text-gray-800">Judul Notifikasi</h2>
                <p id="live-message" class="text-gray-600 mt-4">Detail notifikasi akan tampil di sini.</p>
                <p id="live-date" class="text-xs text-gray-400 mt-4">Tanggal dan waktu.</p>

                <!-- Status sudah dibaca, ditampilkan hanya jika is_read true -->
                <span id="live-read-status" class="text-sm text-green-500 hidden">Sudah Dibaca</span>

                <!-- Form untuk tandai sebagai sudah dibaca -->
                <form id="mark-as-read-form" action="" method="POST" class="hidden">
                    @csrf
                    <button type="submit" class="text-sm text-blue-500 hover:underline">Tandai Telah Dibaca</button>
                </form>
            </div>
        </div>

        </div>

    </div>

    <script>
        function showNotification(notificationId) {
            const notification = @json($notifications);

            console.log(notification); // Tambahkan ini di atas

            const selected = notification.find(n => n.id === notificationId);
            if (selected) {
                // Update judul, pesan, dan tanggal di live card
                document.getElementById('live-title').textContent = selected.data.pengajuan.nama || 'Nama tidak tersedia';
                document.getElementById('live-message').textContent = selected.data.message || 'Tidak ada pesan.';
                document.getElementById('live-date').textContent = new Date(selected.created_at).toLocaleString();

                // Cek apakah sudah dibaca
                const readStatus = selected.is_read;
                const liveReadStatus = document.getElementById('live-read-status');
                const markAsReadForm = document.getElementById('mark-as-read-form');

                if (readStatus) {
                    // Jika sudah dibaca, tampilkan "Sudah Dibaca"
                    liveReadStatus.classList.remove('hidden');
                    markAsReadForm.classList.add('hidden');
                } else {
                    // Jika belum dibaca, tampilkan tombol untuk menandai sebagai sudah dibaca
                    liveReadStatus.classList.add('hidden');
                    markAsReadForm.classList.remove('hidden');
                    // Update action form dengan ID notifikasi yang dipilih
                    markAsReadForm.action = `/markAsRead/${selected.id}`; // Sesuaikan dengan rute yang benar
                }
            }

            // Tampilkan live card
            document.getElementById('live-card').classList.remove('hidden');
        }

    </script>

    @endsection
