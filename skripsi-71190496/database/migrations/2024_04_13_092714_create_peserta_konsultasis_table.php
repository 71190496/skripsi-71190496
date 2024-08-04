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
        Schema::create('peserta_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_konsultasi')->constrained('konsultasis','id');
            $table->foreignId('id_user')->constrained('users','id');
            $table->string('nama_peserta');
            $table->string('email_peserta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_konsultasis');
    }
};
