<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_cpmk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_kuliah_id')->constrained('peserta_kuliah')->onDelete('cascade');
            $table->foreignId('cpmk_id')->constrained('cpmk')->onDelete('cascade');
            $table->decimal('nilai_cpmk', 5, 2);
            $table->boolean('is_tuntas');
            $table->timestamps();

            $table->unique(['peserta_kuliah_id', 'cpmk_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_cpmk');
    }
};