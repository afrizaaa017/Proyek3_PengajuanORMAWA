<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pengajuan Ketua ORMAWA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="flex justify-center m-5">       
        <ol class="items-center sm:flex">
            @foreach ($timelines as $timeline)
            <li class="relative mb-6 sm:mb-0" style="margin-center: 20px;">
                    <div class="flex items-center">
                        <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                    </div>
                    <div class="mt-3 sm:pe-8">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $timeline->judul_timeline }}&nbsp;&nbsp;&nbsp;</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $timeline->tanggal_timeline_awal }} - {{ $timeline->tanggal_timeline_akhir }} &nbsp;&nbsp;&nbsp;</time>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400 overflow-hidden text-ellipsis whitespace-nowrap">
                            {{ $timeline->keterangan }}
                        </p>                        
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
   {{-- modal --}}
<!-- Button to trigger the modal -->
<!-- Inside your foreach loop -->
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-semibold text-center mb-4">Timeline Data</h1>
    <!-- Table -->
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Judul Timeline</th>
                <th class="border px-4 py-2">Tanggal Awal</th>
                <th class="border px-4 py-2">Tanggal Akhir</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timelines as $timeline)
                <tr>
                    <td class="border px-4 py-2">{{ $timeline->judul_timeline }}</td>
                    <td class="border px-4 py-2">{{ $timeline->tanggal_timeline_awal }}</td>
                    <td class="border px-4 py-2">{{ $timeline->tanggal_timeline_akhir }}</td>
                    <td class="border px-4 py-2">
                        <!-- Delete Button -->
                        <form action="{{ route('admin.destroy', $timeline->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this timeline?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{--  modal 2--}}

<!-- Modal -->
<!-- Create Timeline Form -->
<div class="flex flex-wrap bg-white dark:bg-gray-900">
    <!-- Create Timeline Form -->
    <section class="flex-1 bg-white dark:bg-gray-900 p-4">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Timeline</h2>
            <form method="POST" action="{{ route('timeline.store') }}">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    @csrf
                    <div class="sm:col-span-2">
                        <label for="judul_timeline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Timeline</label>
                        <input type="text" id="judul_timeline" name="judul_timeline"
                            class="w-full sm:w-[700px] block p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
                    </div>
                    <div class="sm:col-span-5">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <textarea
                            class="form-control w-full sm:w-[700px] block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="keterangan" name="keterangan" rows="8" placeholder="Your description here" required></textarea>
                    </div>
                    <div class="w-full">
                        <label for="tanggal_timeline_awal" class="form-label">Tanggal Awal</label>
                        <input type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="tanggal_timeline_awal" name="tanggal_timeline_awal" required>
                    </div>
                    <div class="w-full">
                        <label for="tanggal_timeline_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="tanggal_timeline_akhir" name="tanggal_timeline_akhir" required>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Save Timeline</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Edit Timeline Form -->
    <section class="flex-1 bg-white dark:bg-gray-900 p-4">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Timeline</h2>
            <form method="POST" action="{{ route('timeline.update', $timeline->id) }}">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    @csrf
                    @method('PUT')
                    <div class="sm:col-span-2">
                        <label for="judul_timeline"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Timeline</label>
                        <input type="text" id="judul_timeline" name="judul_timeline" value=" "
                            class="w-full sm:w-[700px] block p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" required>
                    </div>
                    <div class="sm:col-span-5">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <textarea
                            class="form-control w-full sm:w-[700px] block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="keterangan" name="keterangan" required></textarea>
                    </div>
                    <div class="w-full">
                        <label for="tanggal_timeline_awal" class="form-label">Tanggal Awal</label>
                        <input type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="tanggal_timeline_awal" name="tanggal_timeline_awal"
                            value="{{ $timeline->tanggal_timeline_awal }}" required>
                    </div>
                    <div class="w-full">
                        <label for="tanggal_timeline_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="tanggal_timeline_akhir" name="tanggal_timeline_akhir"
                            value="{{ $timeline->tanggal_timeline_akhir }}" required>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Update Timeline</button>
                </div>
            </form>
        </div>
    </section>
</div>

    </body>
</html>
