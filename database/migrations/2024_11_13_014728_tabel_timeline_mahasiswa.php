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
        Schema::create("timeline", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("tanggal_pembukaan");
            $table->text("keterangan_pembukaan") -> default("informasi timeline");
            $table->date("tanggal_revisi");
            $table->text("keterangan_revisi") -> default("informasi timeline");
            $table->date("tanggal_penutupan");
            $table->text("keterangan_penutupan") -> default("informasi timeline");
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("timeline");
    }
};
