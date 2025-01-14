<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Untuk menyimpan jenis pengaturan
            $table->text('value')->nullable(); // Bisa digunakan jika Anda ingin menyimpan pengaturan sebagai JSON atau string
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
