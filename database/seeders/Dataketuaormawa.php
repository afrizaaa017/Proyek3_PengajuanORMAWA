<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KetuaOrmawa;


class Dataketuaormawa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ketuas = [
            ['nama_ketua' => 'UKM Assalam', 'ormawa_id' => 1],
            ['nama_ketua' => 'UKM Robotika', 'ormawa_id' => 1],
            ['nama_ketua' => 'UKM Futsal', 'ormawa_id' => 1],
            ['nama_ketua' => 'BEM', 'ormawa_id' => 2],
            ['nama_ketua' => 'MPM', 'ormawa_id' => 2],
            ['nama_ketua' => 'HImpunan Komputer', 'ormawa_id' => 3],
            ['nama_ketua' => 'HImpunan Listirk', 'ormawa_id' => 3],
            ['nama_ketua' => 'HImpunan Komputer', 'ormawa_id' => 3],
        ];

        KetuaOrmawa::insert($ketuas);
    }
}
