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
        Schema::create('fasilitator_reguler', function (Blueprint $table) {
            $table->unsignedInteger('id_pelatihan');
            $table->foreign('id_pelatihan')
                ->references('id')
                ->on('reguler')
                ->onDelete('cascade');
            $table->unsignedInteger('id_fasilitator');
            $table->foreign('id_fasilitator')
                ->references('id_fasilitator')
                ->on('fasilitator_pelatihan_tests')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitator_reguler');
    }
};
