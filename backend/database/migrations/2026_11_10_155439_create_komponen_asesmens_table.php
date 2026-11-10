<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komponen_asesmen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_kuliah_id')->constrained('kelas_kuliah')->onDelete('cascade');
            $table->foreignId('cpmk_id')->constrained('cpmk')->onDelete('cascade');
            $table->string('nama_asesmen', 100);
            $table->decimal('bobot_persen', 5, 2);
            $table->timestamps();
        });

        Schema::create('nilai_asesmen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_kuliah_id')->constrained('peserta_kuliah')->onDelete('cascade');
            $table->foreignId('komponen_asesmen_id')->constrained('komponen_asesmen')->onDelete('cascade');
            $table->decimal('nilai_angka', 5, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->unique(['peserta_kuliah_id', 'komponen_asesmen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_asesmen');
        Schema::dropIfExists('komponen_asesmen');
    }
};