<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cpmk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliah')->onDelete('cascade');
            $table->string('kode_cpmk', 20);
            $table->text('deskripsi');
            $table->decimal('target_pencapaian', 5, 2)->default(70.00);
            $table->timestamps();

            $table->unique(['mata_kuliah_id', 'kode_cpmk']);
        });

        Schema::create('cpmk_cpl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cpmk_id')->constrained('cpmk')->onDelete('cascade');
            $table->foreignId('cpl_id')->constrained('cpl')->onDelete('cascade');
            $table->decimal('bobot_kontribusi', 5, 2)->default(0.00);
            $table->timestamps();

            $table->unique(['cpmk_id', 'cpl_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cpmk_cpl');
        Schema::dropIfExists('cpmk');
    }
};