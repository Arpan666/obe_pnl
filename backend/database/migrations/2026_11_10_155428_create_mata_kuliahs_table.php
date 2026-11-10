<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mk', 20)->unique();
            $table->string('nama_mk', 150);
            $table->tinyInteger('sks_teori')->default(0);
            $table->tinyInteger('sks_praktikum')->default(0);
            $table->tinyInteger('sks_total');
            $table->enum('jenis_mk', ['teori', 'praktikum', 'teori_praktikum']);
            $table->tinyInteger('semester_kurikulum');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};