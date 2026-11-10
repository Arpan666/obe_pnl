<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skala_nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nilai_huruf', 2)->unique();
            $table->decimal('min_angka', 5, 2);
            $table->decimal('max_angka', 5, 2);
            $table->decimal('bobot_angka', 3, 2);
            $table->string('predikat', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skala_nilai');
    }
};