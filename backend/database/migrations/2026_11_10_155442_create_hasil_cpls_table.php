<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_cpl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');
            $table->foreignId('cpl_id')->constrained('cpl')->onDelete('cascade');
            $table->foreignId('tahun_akademik_id')->constrained('tahun_akademik')->onDelete('cascade');
            $table->decimal('nilai_cpl', 5, 2);
            $table->boolean('is_tuntas');
            $table->timestamps();

            $table->unique(['mahasiswa_id', 'cpl_id', 'tahun_akademik_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_cpl');
    }
};