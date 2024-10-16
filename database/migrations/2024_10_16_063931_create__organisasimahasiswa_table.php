<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel Ormawa (One)
        Schema::create('Ormawa', function (Blueprint $table) {
            $table->uuid('id_ormawa')->primary();
            $table->char('Nama_ormawa', 5);
            $table->timestamps();
        });

        // Tabel UKM (Many)
        Schema::create('UKM', function (Blueprint $table) {
            $table->uuid('id_ukm')->primary();
            $table->string('Nama_UKM');
            $table->uuid('id_ormawa'); // Menambahkan kolom foreign key
            $table->timestamps();
        
            // Menambahkan foreign key constraint
            $table->foreign('id_ormawa')->references('id_ormawa')->on('Ormawa')->onDelete('cascade');
        });
        

        // Tabel BEM&MPM (Many)
        Schema::create('BEM&MPM', function (Blueprint $table) {
            $table->uuid('id_bem&MPM')->primary();
            $table->string('Bem&MPM');
            
            // Foreign key to Ormawa
            $table->uuid('id_ormawa');
            $table->foreign('id_ormawa')->references('id_ormawa')->on('Ormawa')->onDelete('cascade');
            
            $table->timestamps();
        });

        // Tabel Himpunan (Many)
        Schema::create('Himpunan', function (Blueprint $table) {
            $table->uuid('id_himpunan')->primary();
            $table->string('Nama_himpunan');
            
            // Foreign key to Ormawa
            $table->uuid('id_ormawa');
            $table->foreign('id_ormawa')->references('id_ormawa')->on('Ormawa')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Himpunan');
        Schema::dropIfExists('BEM&MPM');
        Schema::dropIfExists('UKM');
        Schema::dropIfExists('Ormawa');
    }
};
