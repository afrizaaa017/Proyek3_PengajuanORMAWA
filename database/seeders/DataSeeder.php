<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ormawa;
use App\Models\Ukm;
use App\Models\BemMpm;
use App\Models\Himpunan;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
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
