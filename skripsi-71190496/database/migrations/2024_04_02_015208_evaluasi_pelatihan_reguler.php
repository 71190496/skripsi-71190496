<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluasi_pelatihan_reguler', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelatihan')->constrained('pelatihans','id_pelatihan');
            $table->foreignId('id_user')->constrained('users','id');
            $table->string('ruang_kelas');
            $table->string('partisipasi_peserta');
            $table->string('disiplin_peserta');
            $table->string('kemampuan_menyerap_materi');
            $table->string('keterbukaan_gagasan');
            $table->string('catatan_peserta');
            $table->string('konsumsi');
            $table->string('layanan_panitia');
            $table->string('memperbaiki_pelatihan');
            $table->string('rekomendasi_peserta');
            $table->string('kontak');
            $table->text('hal_yang_dipelajari');
            $table->text('pelatihan_dibutuhkan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_pelatihan_reguler');
    }
};
