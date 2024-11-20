<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timelines')->insert([
            [
                'judul_timeline' => 'Pendaftaran Calon Ketua ORMAWA',
                'tanggal_timeline_awal' => '2024-11-01',
                'tanggal_timeline_akhir' => '2024-11-05',
            ],
            [
                'judul_timeline' => 'Verifikasi Calon Ketua ORMAWA',
                'tanggal_timeline_awal' => '2024-11-06',
                'tanggal_timeline_akhir' => '2024-11-10',
            ],
            [
                'judul_timeline' => 'Pemilihan Ketua ORMAWA',
                'tanggal_timeline_awal' => '2024-11-10',
                'tanggal_timeline_akhir' => '2024-11-15',
            ],
            // Tambahkan data lainnya jika diperlukan
        ]);
    }
}
