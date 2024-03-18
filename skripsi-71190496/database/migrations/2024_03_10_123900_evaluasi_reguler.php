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
        Schema::create('evaluasi_reguler', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelatihan')->constrained('pelatihans','id_pelatihan');
            $table->foreignId('id_fasilitator')->constrained('fasilitator_pelatihan_tests','id_fasilitator');
            $table->unsignedTinyInteger('metode');
            $table->unsignedTinyInteger('respon_peserta');
            $table->unsignedTinyInteger('pengembangan_proses');
            $table->unsignedTinyInteger('kecukupan_waktu');
            $table->unsignedTinyInteger('penguasaan_materi');
            $table->unsignedTinyInteger('kemampuan_menyampaikan_materi');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi');
    }
};
