<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_akademik_id')->constrained('tahun_akademik')->onDelete('restrict');
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliah')->onDelete('restrict');
            $table->foreignId('skema_penilaian_id')->nullable()->constrained('skema_penilaian')->onDelete('set null');
            $table->string('nama_kelas', 10);
            $table->integer('kuota')->default(30);
            $table->enum('status_penilaian', ['draft', 'submitted', 'approved', 'locked'])->default('draft');
            $table->timestamps();
        });

        Schema::create('dosen_mengajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_kuliah_id')->constrained('kelas_kuliah')->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained('dosen')->onDelete('cascade');
            $table->boolean('is_koordinator')->default(false);
            $table->timestamps();

            $table->unique(['kelas_kuliah_id', 'dosen_id']);
        });

        Schema::create('peserta_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_kuliah_id')->constrained('kelas_kuliah')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');
            $table->decimal('nilai_akhir_angka', 5, 2)->nullable();
            $table->string('nilai_akhir_huruf', 2)->nullable();
            $table->decimal('bobot_akhir_angka', 3, 2)->nullable();
            $table->boolean('status_lulus')->nullable();
            $table->timestamps();

            $table->unique(['kelas_kuliah_id', 'mahasiswa_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_kuliah');
        Schema::dropIfExists('dosen_mengajar');
        Schema::dropIfExists('kelas_kuliah');
    }
};