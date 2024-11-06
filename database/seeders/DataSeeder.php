<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ormawa;
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
            ['id_ormawa' => 1, 'nama_ormawa' => 'UKM',],
            ['id_ormawa' => 2, 'nama_ormawa' => 'BEM&MPM'],
            ['id_ormawa' => 3, 'nama_ormawa' => 'Himpunan'],
        ];

        // Menggunakan Eloquent untuk menyimpan data
        foreach ($ormawaData as $data) {
            Ormawa::create($data);
        }
    }
}
