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
        Schema::create('peserta_survey_kepuasan', function (Blueprint $table) {
            $table->id();
            $table->integer('tingkat_kepuasan');
            $table->integer('relevansi_pekerjaan');
            $table->integer('relevansi_biaya');
            $table->string('pembelajaran');
            $table->string('saran');
            $table->string('intensitas_pelatihan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_survey_kepuasan');
    }
};
