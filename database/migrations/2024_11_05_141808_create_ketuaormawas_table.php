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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketua_ormawa');
    }
};
