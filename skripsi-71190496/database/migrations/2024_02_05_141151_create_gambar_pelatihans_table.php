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
        Schema::create('gambar_pelatihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelatihan');
            $table->string('path');
            // Tambahkan kolom-kolom lain yang mungkin Anda butuhkan

            $table->foreign('id_pelatihan')->references('id_pelatihan')->on('pelatihans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_pelatihans');
    }
};
