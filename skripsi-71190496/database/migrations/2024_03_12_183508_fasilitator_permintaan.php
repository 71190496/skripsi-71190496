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
        Schema::create('fasilitator_permintaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_permintaan');
            $table->unsignedBigInteger('id_fasilitator');

            $table->foreign('id_permintaan')->references('id')->on('permintaan');
            $table->foreign('id_fasilitator')->references('id_fasilitator')->on('fasilitator_pelatihan_tests');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitator_permintaan');
    }
};
