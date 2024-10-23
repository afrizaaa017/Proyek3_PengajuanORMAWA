<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ormawa;
use App\Models\Ukm;
use App\Models\Himpunan;
use App\Models\Prodi;
use App\Models\Jurusan;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            ['nama_jurusan' => 'Teknik Informatika'],
            ['nama_jurusan' => 'Sistem Informasi'],
            ['nama_jurusan' => 'Teknik Elektro'],
            ['nama_jurusan' => 'Teknik Mesin'],
            ['nama_jurusan' => 'Teknik Sipil'],
        ];

        // Insert data ke tabel jurusan
        Jurusan::insert($jurusans);
        $prodis = [
            ['nama_prodi' => 'S1 Teknik Informatika', 'jurusan_id' => 1],
            ['nama_prodi' => 'S1 Sistem Informasi', 'jurusan_id' => 1],
            ['nama_prodi' => 'S1 Teknik Elektro', 'jurusan_id' => 3],
            ['nama_prodi' => 'S1 Teknik Mesin', 'jurusan_id' => 4],
            ['nama_prodi' => 'S1 Teknik Sipil', 'jurusan_id' => 5],
        ];

        // Insert data ke tabel prodi
        Prodi::insert($prodis);

        $ormawaData = [
            ['id_ormawa' => 1, 'nama_ormawa' => 'UKM'],
            ['id_ormawa' => 2, 'nama_ormawa' => 'BEM&MPM'],
            ['id_ormawa' => 3, 'nama_ormawa' => 'Himpunan'],
        ];

        // Menggunakan Eloquent untuk menyimpan data
        foreach ($ormawaData as $data) {
            Ormawa::create($data);
        }
    // Data UKM
    $ukmData = [
        ['nama_ukm' => 'UKM Teknologi Informasi', 'ormawa_id' => 1],
        ['nama_ukm' => 'UKM Olahraga', 'ormawa_id' => 1],
        ['nama_ukm' => 'UKM Seni dan Budaya', 'ormawa_id' => 1],
        ['nama_ukm' => 'UKM Kewirausahaan', 'ormawa_id' => 1],
        ['nama_ukm' => 'UKM Bahasa', 'ormawa_id' => 1],
    ];

    foreach ($ukmData as $data) {
        Ukm::create($data); // Menggunakan Eloquent untuk menyimpan data
    }

    // Data Himpunan
    $himpunanData = [
        ['nama_himpunan' => 'Himpunan Mahasiswa Teknik', 'ormawa_id' => 3],
        ['nama_himpunan' => 'Himpunan Mahasiswa Ekonomi', 'ormawa_id' => 3],
        ['nama_himpunan' => 'Himpunan Mahasiswa Sastra', 'ormawa_id' => 3],
    ];

    foreach ($himpunanData as $data) {
        himpunan::create($data); // Menggunakan Eloquent untuk menyimpan data
    }
    }
}
