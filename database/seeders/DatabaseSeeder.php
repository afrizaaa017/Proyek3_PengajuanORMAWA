<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'Afriza',
                'email' => 'za@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Joko',
                'email' => 'joko@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'), // default password
                'role_id' => 'staff_kemahasiswaan',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Step1
            [
                'name' => 'Majelis Perwakilan Mahasiswa (MPM)',
                'email' => 'MPM@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Badan Eksekutif Mahasiswa (BEM)',
                'email' => 'BEM@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknik Sipil',
                'email' => 'HMJTS@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknik Mesin',
                'email' => 'HMJTM@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknik Elektro',
                'email' => 'HMJTE@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Step 2
            [
                'name' => 'Teknik Kimia',
                'email' => 'HMJTK@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknik Refrigerasi dan Tata Udara',
                'email' => 'HMJTRA@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknik Komputer dan Informatika',
                'email' => 'HMJTKI@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teknik Konversi Energi',
                'email' => 'HMJTKE@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Akuntansi',
                'email' => 'HMJTA@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Administrasi Niaga',
                'email' => 'HMJAN@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bahasa Inggris',
                'email' => 'HMJBI@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // UKM
            [
                'name' => 'Robotika	',
                'email' => 'UKM-ROBOTIKA@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Otomotif',
                'email' => 'UKM-OTOMOTIF@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kewirausahaan',
                'email' => 'UKM-WIRUS@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Step3
            [
                'name' => 'ELTRAS',
                'email' => 'UKM-ELTRAS@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Assalam',
                'email' => 'UKM-ASSALAM@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PMK',
                'email' => 'UKM-PMK@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KMK',
                'email' => 'UKM-KMK@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kabayan',
                'email' => 'UKM-KABAYAN@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PSM',
                'email' => 'UKM-PSM@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Musik dan Teater',
                'email' => 'UKM-MUSKING@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UKBM',
                'email' => 'UKM-UKBM@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UBSU',
                'email' => 'UKM-UBSU@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
// da
            [
                'name' => 'USF',
                'email' => 'UKM-USF@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bola Basket',
                'email' => 'UKM-BASKET@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bola Voli',
                'email' => 'UKM-VOLLY@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bulutangkis',
                'email' => 'UKM-BULUTANGKIS@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Catur',
                'email' => 'UKM-CATUR@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bela Diri',
                'email' => 'UKM-BELADIRI@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PPRPG-SAGA',
                'email' => 'UKM-SAGA@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KSR',
                'email' => 'UKM-KSR@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pramuka',
                'email' => 'UKM-PRAMUKA@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fellas',
                'email' => 'UKM-FELLAS@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('Polban12345'), // default password
                'role_id' => 'mahasiswa',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $this->call(PengajuanSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(Dataketuaormawa::class);
        $this->call(TimelineSeeder::class);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
