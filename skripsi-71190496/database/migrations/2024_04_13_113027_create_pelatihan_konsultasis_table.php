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
        Schema::create('pelatihan_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_konsultasi')->constrained('konsultasis', 'id');
            $table->foreignId('id_tema')->constrained('tema', 'id');
            $table->string('nama_pelatihan');
            $table->string('jenis_pelatihan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('deskripsi_pelatihan');
            $table->timestamps();
        });

        Schema::create('fasilitator_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_konsultasi')->constrained('konsultasis','id');
            $table->foreignId('id_fasilitator')->constrained('fasilitator_pelatihan_test','id_fasilitator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan_konsultasis');
        Schema::dropIfExists('fasilitator_konsultasis');
    }
};
