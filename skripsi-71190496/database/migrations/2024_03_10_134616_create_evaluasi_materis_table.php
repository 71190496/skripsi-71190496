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
        Schema::create('evaluasi_materi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelatihan')->constrained('pelatihans','id_pelatihan');
            $table->foreignId('id_jawaban')->constrained('evaluasi_jawabans','id_jawaban'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_materis');
    }
};