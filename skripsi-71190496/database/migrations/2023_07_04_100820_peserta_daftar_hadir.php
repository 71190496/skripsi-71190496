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
        Schema::create('peserta_daftar_hadir', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kontak_peserta');
            $table->unsignedBigInteger('id_pelatihan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_gender');
            $table->unsignedBigInteger('id_organisasi');
            $table->string('nama_peserta');
            $table->string('email_peserta');
            $table->string('nama_organisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_hadir');
    }
};
