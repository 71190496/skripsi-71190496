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
        Schema::create('user_presensi', function (Blueprint $table) {
            $table->id('id_user_presensi');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_presensi');
            $table->timestamp('tanggal_presensi');
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_presensi')->references('id_presensi')->on('presensi')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_presensi');
    }
};