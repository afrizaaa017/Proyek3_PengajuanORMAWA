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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->text('nim')->unique();
            $table->text('jurusan');
            $table->string('prodi');
            $table->text('ormawa');
            $table->text('ketua_ormawa');
            $table->text('periode');
            $table->text('telp');
            $table->text('email');
            $table->enum('status', ['Sedang Diproses', 'Diterima', 'Ditolak'])->default('Sedang Diproses');
            $table->text('keterangan')->default('Kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
