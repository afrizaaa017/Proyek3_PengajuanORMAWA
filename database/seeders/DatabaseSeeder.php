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
            [
                'name' => 'tes',
                'email' => 'tes@polban.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'), // default password
                'role_id' => 'dummy',
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
