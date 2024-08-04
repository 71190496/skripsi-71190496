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
        Schema::create('survey_pelatihan_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_konsultasi')->constrained('konsultasis','id');
            $table->foreignId('id_user')->constrained('users','id');
            $table->foreignId('id_provinsi')->constrained('provinsi','id');
            $table->foreignId('id_kabupaten_kota')->constrained('kabupaten_kota','id');
            $table->JSON('data_respons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_pelatihan_konsultasis');
    }
};
