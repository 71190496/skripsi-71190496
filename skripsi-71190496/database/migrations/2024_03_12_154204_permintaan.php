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
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_fasilitator');
            $table->unsignedBigInteger('id_tema');
            $table->string('nama_pelatihan');
            $table->string('jenis_pelatihan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('deskripsi_pelatihan');
            $table->timestamps();

            // Menambahkan constraint foreign key
            // $table->foreign('id_fasilitator')->references('id_fasilitator')->on('fasilitator_pelatihan_tests');
            $table->foreign('id_tema')->references('id')->on('tema');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan');
    }
};
