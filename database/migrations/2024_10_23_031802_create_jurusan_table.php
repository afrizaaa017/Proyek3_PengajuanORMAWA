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
        // Migration Jurusan
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id('id_jurusan');
            $table->string('nama_jurusan');
            $table->timestamps();
        });

        // Migration Prodi
        Schema::create('prodis', function (Blueprint $table) {
            $table->id('id_prodi'); // Primary Key
            $table->string('nama_prodi'); // Nama Prodi
            // Menggunakan jurusan_id dan merujuk ke id_jurusan
            $table->foreignId('jurusan_id')->constrained('jurusans', 'id_jurusan')->onDelete('cascade'); 
            $table->timestamps();
        });

            
    }

    /**
     * Reverse the migrations.
     */

    public function down()
    {
        Schema::dropIfExists('jurusans');
        Schema::dropIfExists('prodis');
    }
};
