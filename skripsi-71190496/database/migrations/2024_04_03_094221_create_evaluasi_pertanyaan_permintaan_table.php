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
        Schema::create('evaluasi_pertanyaan_permintaan', function (Blueprint $table) {
            $table->id('id_pertanyaan');
            $table->text('pertanyaan');
            $table->string('tipe');
            $table->unsignedBigInteger('id_permintaan');
            $table->foreign('id_permintaan')->references('id')->on('permintaan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_pertanyaan_permintaans');
    }
};
