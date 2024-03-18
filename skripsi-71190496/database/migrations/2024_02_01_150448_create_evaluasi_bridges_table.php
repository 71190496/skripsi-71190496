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
        Schema::create('evaluasi_bridge', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanyaan');
            $table->unsignedBigInteger('id_jawaban');
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('evaluasi_pertanyaan')->onDelete('cascade');
            $table->foreign('id_jawaban')->references('id_jawaban')->on('evaluasi_jawaban')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_bridge');
    }
};
