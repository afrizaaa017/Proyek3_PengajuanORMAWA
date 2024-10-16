<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ormawa;
use App\Models\UKM;
use App\Models\BEM_MPM;
use App\Models\Himpunan;
use Illuminate\Support\Str;

class dataform extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*------------------------------------------
        Dummy Data for Ormawa
        --------------------------------------------*/
        $ormawa1 = Ormawa::create(['id_ormawa' => Str::uuid(), 'Nama_ormawa' => 'UKM']);
        $ormawa2 = Ormawa::create(['id_ormawa' => Str::uuid(), 'Nama_ormawa' => 'MPM']);

        /*------------------------------------------
        Dummy Data for UKM
        --------------------------------------------*/
        $ukm1 = UKM::create(['id_ukm' => Str::uuid(), 'Nama_UKM' => 'UKM 1', 'id_ormawa' => $ormawa1->id_ormawa]);
        $ukm2 = UKM::create(['id_ukm' => Str::uuid(), 'Nama_UKM' => 'UKM 2', 'id_ormawa' => $ormawa1->id_ormawa]);
        $ukm3 = UKM::create(['id_ukm' => Str::uuid(), 'Nama_UKM' => 'UKM 3', 'id_ormawa' => $ormawa2->id_ormawa]);

        /*------------------------------------------
        Dummy Data for BEM&MPM
        --------------------------------------------*/
        $bem_mpm1 = BEM_MPM::create(['id_bem&MPM' => Str::uuid(), 'Bem&MPM' => 'BEM 1', 'id_ormawa' => $ormawa1->id_ormawa]);
        $bem_mpm2 = BEM_MPM::create(['id_bem&MPM' => Str::uuid(), 'Bem&MPM' => 'BEM 2', 'id_ormawa' => $ormawa2->id_ormawa]);

        /*------------------------------------------
        Dummy Data for Himpunan
        --------------------------------------------*/
        $himpunan1 = Himpunan::create(['id_himpunan' => Str::uuid(), 'Nama_himpunan' => 'Himpunan 1', 'id_ormawa' => $ormawa1->id_ormawa]);
        $himpunan2 = Himpunan::create(['id_himpunan' => Str::uuid(), 'Nama_himpunan' => 'Himpunan 2', 'id_ormawa' => $ormawa2->id_ormawa]);
    }
}
