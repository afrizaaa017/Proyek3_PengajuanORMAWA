<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabel Ormawa
        Schema::create('ormawa', function (Blueprint $table) {
            $table->id('id_ormawa');
            $table->string('nama_ormawa');
            $table->timestamps();
        });

        // Tabel UKM
        Schema::create('ukm', function (Blueprint $table) {
            $table->id('id_ukm');
            $table->string('nama_ukm');
            $table->unsignedBigInteger('ormawa_id'); // Foreign key to Ormawa
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('ormawa_id')->references('id_ormawa')->on('ormawa')->onDelete('cascade');
        });

        // Tabel Himpunan
        Schema::create('himpunan', function (Blueprint $table) {
            $table->id('id_himpunan');
            $table->string('nama_himpunan');
            $table->unsignedBigInteger('ormawa_id'); // Foreign key to Ormawa
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('ormawa_id')->references('id_ormawa')->on('ormawa')->onDelete('cascade');
        });

        // Tabel BEM & MPM
        Schema::create('bem_mpm', function (Blueprint $table) {
            $table->id('id_bem_mpm');
            $table->string('bem_mpm'); // true untuk BEM, false untuk MPM
            $table->unsignedBigInteger('ormawa_id'); // Foreign key to Ormawa
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('ormawa_id')->references('id_ormawa')->on('ormawa')->onDelete('cascade');
              
        });

        // Tabel Ketua Ormawa
        Schema::create('ketua_ormawa', function (Blueprint $table) {
            $table->id('id_ketua_ormawa');
            $table->string('nama_ketua');
            $table->unsignedBigInteger('ormawa_id'); // Foreign key to Ormawa
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('ormawa_id')->references('id_ormawa')->on('ormawa')->onDelete('cascade');
        });
    }

    public function down()  
    {
        Schema::dropIfExists('ketua_ormawa');
        Schema::dropIfExists('bem_mpm');
        Schema::dropIfExists('himpunan');
        Schema::dropIfExists('ukm');
        Schema::dropIfExists('ormawa');
    }
};
