<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_perubahan_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nilai_asesmen_id')->constrained('nilai_asesmen')->onDelete('cascade');
            $table->foreignId('updated_by')->constrained('users')->onDelete('restrict');
            $table->decimal('nilai_lama', 5, 2)->nullable();
            $table->decimal('nilai_baru', 5, 2);
            $table->text('alasan_perubahan');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_perubahan_nilai');
    }
};