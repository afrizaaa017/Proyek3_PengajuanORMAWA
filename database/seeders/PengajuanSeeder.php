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
            'nama' => "Test",
            'nim' => '11111',
            'jurusan' => 'Teknis',
            'prodi' => 'S1',
            'ormawa' => 'Himakom',
            'ketua_ormawa' => 'test',
            'periode' => '2024-2025',
            'telp' => '6289',
            'email' => 'test@gmail.com',
            'created_at' => $now,
            'updated_at' => $now,
            'status' => 'sedang diproses',
        ],
        [
            'nama' => "Tita",
            'nim' => '22222',
            'jurusan' => 'Teknis',
            'prodi' => 'S1',
            'ormawa' => 'Himakom',
            'periode' => '2023-2024',
            'ketua_ormawa' => 'test',
            'telp' => '6289',
            'email' => 'test2@gmail.com',
            'created_at' => $now,
            'updated_at' => $now,
            'status' => 'ditolak',
        ],
        [
            'nama' => "Rina",
            'nim' => '33333',
            'jurusan' => 'Teknis',
            'prodi' => 'S1',
            'ormawa' => 'Himakom',
            'periode' => '2024-2025',
            'ketua_ormawa' => 'test',
            'telp' => '6289',
            'email' => 'test@gmail.com',
            'created_at' => $now,
            'updated_at' => $now,
            'status' => 'diterima'
        ]
        ]);
    }
}
