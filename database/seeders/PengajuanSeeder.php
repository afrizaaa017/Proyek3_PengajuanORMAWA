<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use App\Enums\PengajuanStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $now = now();
        // Pengajuan::insert([
        //     [
        //         'nama' => "Syahla Salsabila",
        //         'nim' => '11111',
        //         'jurusan' => 'Teknik Komputer dan Informatika',
        //         'prodi' => 'D3-Teknik Informatika',
        //         'ormawa' => 'HMJ',
        //         'ketua_ormawa' => 'HMJ Teknik Komputer dan Informatika',
        //         'periode' => '2024-2025',
        //         'telp' => '6289',
        //         'email' => 'test@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Menunggu Verifikasi',
        //     ],
        //     [
        //         'nama' => "Tita Erlina",
        //         'nim' => '22222',
        //         'jurusan' => 'Bahasa Inggris',
        //         'prodi' => 'D3-Bahasa Inggris',
        //         'ormawa' => 'HMJ',
        //         'periode' => '2024-2025',
        //         'ketua_ormawa' => 'HMJ Bahasa Inggris',
        //         'telp' => '6289',
        //         'email' => 'test2@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Perlu Revisi',
        //     ],
        //     [
        //         'nama' => "Rina Nana",
        //         'nim' => '33333',
        //         'jurusan' => 'Teknik Mesin',
        //         'prodi' => 'D3-Teknik Mesin',
        //         'ormawa' => 'UKM',
        //         'periode' => '2024-2025',
        //         'ketua_ormawa' => 'UKM Fellas',
        //         'telp' => '6289',
        //         'email' => 'test@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Diterima'
        //     ],
        //     // Data tambahan
        //     [
        //         'nama' => "Ali Imron",
        //         'nim' => '44444',
        //         'jurusan' => 'Teknik Energi',
        //         'prodi' => 'D4-Konservasi Energi',
        //         'ormawa' => 'HMJ',
        //         'ketua_ormawa' => 'HMJ Teknik Konversi Energi',
        //         'periode' => '2024-2025',
        //         'telp' => '6281234',
        //         'email' => 'ali@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Menunggu Verifikasi'
        //     ],
        //     [
        //         'nama' => "Melly Dwilliani",
        //         'nim' => '55555',
        //         'jurusan' => 'Administrasi Niaga',
        //         'prodi' => 'D4-Manajemen Aset',
        //         'ormawa' => 'HMJ',
        //         'ketua_ormawa' => 'HMJ Administrasi Niaga',
        //         'periode' => '2024-2025',
        //         'telp' => '6282345',
        //         'email' => 'budi@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Perlu Revisi'
        //     ],
        //     [
        //         'nama' => "Citra Asih",
        //         'nim' => '66666',
        //         'jurusan' => 'Teknik Kimia',
        //         'prodi' => 'D3-Analis Kimia',
        //         'ormawa' => 'UKM',
        //         'ketua_ormawa' => 'UKM Kabayan',
        //         'periode' => '2024-2025',
        //         'telp' => '6283456',
        //         'email' => 'citra@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Diterima'
        //     ],
        //     [
        //         'nama' => "Dedi Suardi",
        //         'nim' => '77777',
        //         'jurusan' => 'Teknik Sipil',
        //         'prodi' => 'D3-Jembatan',
        //         'ormawa' => 'UKM',
        //         'ketua_ormawa' => 'UKM Musik dan Theater',
        //         'periode' => '2024-2025',
        //         'telp' => '6284567',
        //         'email' => 'dedi@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Menunggu Verifikasi'
        //     ],
        //     [
        //         'nama' => "Elisa Utami",
        //         'nim' => '88888',
        //         'jurusan' => 'Akuntansi',
        //         'prodi' => 'D3-Akuntansi',
        //         'ormawa' => 'HMJ',
        //         'ketua_ormawa' => 'HMJ Akuntansi',
        //         'periode' => '2024-2025',
        //         'telp' => '6285678',
        //         'email' => 'elisa@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Perlu Revisi'
        //     ],
        //     [
        //         'nama' => "Isyana Putri",
        //         'nim' => '99999',
        //         'jurusan' => 'Teknik Komputer dan Informatika',
        //         'prodi' => 'D3-Teknik Informatika',
        //         'ormawa' => 'BEM&MPM',
        //         'ketua_ormawa' => 'BEM',
        //         'periode' => '2024-2025',
        //         'telp' => '6286789',
        //         'email' => 'fahmi@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Diterima'
        //     ],
        //     [
        //         'nama' => "Gina Ami",
        //         'nim' => '101010',
        //         'jurusan' => 'Teknik Mesin',
        //         'prodi' => 'D3-Teknik Mesin',
        //         'ormawa' => 'HMJ',
        //         'ketua_ormawa' => 'HMJ Teknik Mesin',
        //         'periode' => '2024-2025',
        //         'telp' => '6287890',
        //         'email' => 'gina@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Menunggu Verifikasi Ulang'
        //     ],
        //     [
        //         'nama' => "Hana Sasa",
        //         'nim' => '121212',
        //         'jurusan' => 'Teknik Kimia',
        //         'prodi' => 'D3-Teknik Kimia',
        //         'ormawa' => 'HMJ',
        //         'ketua_ormawa' => 'HMJ Teknik Kimia',
        //         'periode' => '2024-2025',
        //         'telp' => '6288901',
        //         'email' => 'hana@gmail.com',
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //         'status' => 'Perlu Revisi'
        //     ]
        // ]);
    }
}
