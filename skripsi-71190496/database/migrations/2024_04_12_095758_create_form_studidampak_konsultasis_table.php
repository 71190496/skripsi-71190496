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
        Schema::create('form_studidampak_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_konsultasi')->constrained('konsultasis','id');
            $table->JSON('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_studidampak_konsultasis');
    }
};
