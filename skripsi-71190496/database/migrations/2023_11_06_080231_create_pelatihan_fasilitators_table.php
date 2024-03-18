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
        Schema::create('pelatihan_fasilitators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelatihan');
            $table->unsignedBigInteger('fasilitator_id');

            $table->foreign('id_pelatihan')->references('id')->on('pelatihans');
            $table->foreign('fasilitator_id')->references('id')->on('fasilitator_pelatihan_tests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan_fasilitators');
    }
};
