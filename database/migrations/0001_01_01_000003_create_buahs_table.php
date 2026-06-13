<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration {
    public function up(): void
    {
        Schema::create('buahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('nama_latin')->nullable();
            $table->string('asal_daerah')->nullable();
            $table->string('musim_panen')->nullable();
            $table->text('deskripsi');
            $table->text('manfaat')->nullable();
            $table->string('gambar')->nullable();
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('buahs');
    }
};