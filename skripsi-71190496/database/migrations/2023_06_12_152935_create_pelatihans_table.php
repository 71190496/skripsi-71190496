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
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis_produk');
            $table->integer('id_tema');
            $table->integer('id_fasilitator');
            $table->string('nama_pelatihan');
            $table->string('image');
            $table->text('deskripsi_pelatihan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihans');
    }
};
