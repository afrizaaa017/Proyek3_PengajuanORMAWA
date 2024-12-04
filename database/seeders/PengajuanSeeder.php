<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        Pengajuan::insert([
            [
                'nama' => "Syahla Salsabila",
                'nim' => '11111',
                'jurusan' => 'Teknik Komputer dan Informatika',
                'prodi' => 'D3-Teknik Informatika',
                'ormawa' => 'HIMAKOM',
                'ketua_ormawa' => 'HMJ',
                'periode' => '2024-2025',
                'telp' => '6289',
                'email' => 'test@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'sedang diproses',
            ],
            [
                'nama' => "Tita Erlina",
                'nim' => '22222',
                'jurusan' => 'Bahasa Inggris',
                'prodi' => 'D3-Bahasa Inggris',
                'ormawa' => 'HIMARIS',
                'periode' => '2023-2024',
                'ketua_ormawa' => 'HMJ',
                'telp' => '6289',
                'email' => 'test2@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'Ditolak',
            ],
            [
                'nama' => "Rina Nana",
                'nim' => '33333',
                'jurusan' => 'Teknik Mesin',
                'prodi' => 'D3-Teknik Mesin',
                'ormawa' => 'HMJTM',
                'periode' => '2024-2025',
                'ketua_ormawa' => 'test',
                'telp' => '6289',
                'email' => 'test@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'Diterima'
            ],
            // Data tambahan
            [
                'nama' => "Ali Imron",
                'nim' => '44444',
                'jurusan' => 'Teknik Energi',
                'prodi' => 'D4-Konservasi Energi',
                'ormawa' => 'HMTE',
                'ketua_ormawa' => 'HMJ',
                'periode' => '2024-2025',
                'telp' => '6281234',
                'email' => 'ali@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'sedang diproses'
            ],
            [
                'nama' => "Melly Dwilliani",
                'nim' => '55555',
                'jurusan' => 'Administrasi Niaga',
                'prodi' => 'D4-Manajemen Aset',
                'ormawa' => 'HMAN',
                'ketua_ormawa' => 'HMJ',
                'periode' => '2024-2025',
                'telp' => '6282345',
                'email' => 'budi@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'Ditolak'
            ],
            [
                'nama' => "Citra Asih",
                'nim' => '66666',
                'jurusan' => 'Teknik Kimia',
                'prodi' => 'D3-Analis Kimia',
                'ormawa' => 'KABAYAN',
                'ketua_ormawa' => 'UKM',
                'periode' => '2024-2025',
                'telp' => '6283456',
                'email' => 'citra@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'Diterima'
            ],
            [
                'nama' => "Dedi Suardi",
                'nim' => '77777',
                'jurusan' => 'Teknik Sipil',
                'prodi' => 'D3-Jembatan',
                'ormawa' => 'MUSKING',
                'ketua_ormawa' => 'UKM',
                'periode' => '2024-2025',
                'telp' => '6284567',
                'email' => 'dedi@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'sedang diproses'
            ],
            [
                'nama' => "Elisa Utami",
                'nim' => '88888',
                'jurusan' => 'Akuntansi',
                'prodi' => 'D3-Akuntansi',
                'ormawa' => 'HMAK',
                'ketua_ormawa' => 'HMJ',
                'periode' => '2023-2024',
                'telp' => '6285678',
                'email' => 'elisa@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'Ditolak'
            ],
            [
                'nama' => "Isyana Putri",
                'nim' => '99999',
                'jurusan' => 'Teknik Komputer dan Informatika',
                'prodi' => 'D3-Teknik Informatika',
                'ormawa' => 'BEM',
                'ketua_ormawa' => 'Pusat',
                'periode' => '2024-2025',
                'telp' => '6286789',
                'email' => 'fahmi@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'Diterima'
            ],
            [
                'nama' => "Gina Ami",
                'nim' => '101010',
                'jurusan' => 'Teknik Mesin',
                'prodi' => 'D3-Teknik Mesin',
                'ormawa' => 'HMJTM',
                'ketua_ormawa' => 'HMJ',
                'periode' => '2023-2024',
                'telp' => '6287890',
                'email' => 'gina@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'sedang diproses'
            ],
            [
                'nama' => "Hana Sasa",
                'nim' => '121212',
                'jurusan' => 'Teknik Kimia',
                'prodi' => 'D3-Teknik Kimia',
                'ormawa' => 'HMJTK',
                'ketua_ormawa' => 'HMJ',
                'periode' => '2023-2024',
                'telp' => '6288901',
                'email' => 'hana@gmail.com',
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 'Ditolak'
            ]
        ]);
    }
}
