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
        Schema::create('silabus_pelatihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelatihan');
            $table->string('judul');
            $table->text('silabus');

            $table->foreign('id_pelatihan')->references('id')->on('pelatihans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silabus_pelatihans');
    }
};
