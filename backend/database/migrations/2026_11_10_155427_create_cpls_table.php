<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cpl', function (Blueprint $table) {
            $table->id();
            $table->string('kode_cpl', 15)->unique(); // CPL-01, dll
            $table->text('deskripsi');
            $table->enum('kategori', ['sikap', 'keterampilan_umum', 'keterampilan_khusus', 'pengetahuan']);
            $table->decimal('target_pencapaian', 5, 2)->default(70.00);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cpl');
    }
};