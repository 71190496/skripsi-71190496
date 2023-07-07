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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis_organisasi');
            $table->integer('id_jenis_layanan');
            $table->integer('id_kabupaten');
            $table->integer('id_provinsi');
            $table->integer('id_negara');
            $table->string('nama_organisasi');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_hp');
            $table->string('deskripsi_pelatihan');
            $table->timestamps();                          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
