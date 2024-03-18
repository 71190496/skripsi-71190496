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
        Schema::create('evaluasi_pertanyaan', function (Blueprint $table) {
            $table->id('id_pertanyaan');
            $table->text('pertanyaan');
            $table->unsignedBigInteger('id_pelatihan');
            $table->foreign('id_pelatihan')->references('id_pelatihan')->on('pelatihans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_pertanyaans');
    }
};