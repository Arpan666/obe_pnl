<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skema_penilaian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_skema', 100);
            $table->enum('jenis_mk', ['teori', 'praktikum', 'kombinasi']);
            $table->text('deskripsi')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        Schema::create('komponen_skema_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skema_penilaian_id')->constrained('skema_penilaian')->onDelete('cascade');
            $table->string('nama_komponen', 100);
            $table->decimal('bobot_persen', 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komponen_skema_penilaian');
        Schema::dropIfExists('skema_penilaian');
    }
};