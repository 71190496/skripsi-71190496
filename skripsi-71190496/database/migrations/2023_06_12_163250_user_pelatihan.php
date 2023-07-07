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
        Schema::create('user_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_pelatihan')->constrained('pelatihans')->onDelete('cascade');
            $table->integer('id_gender');
            $table->integer('id_rentang_usia');
            $table->integer('id_kabupaten');
            $table->integer('id_provinsi');
            $table->integer('id_negara');
            $table->integer('id_organisasi');
            $table->string('nama_peserta');
            $table->string('email_peserta');
            $table->string('no_hp');
            $table->string('nama_organisasi');
            $table->string('jabatan_peserta');
            $table->string('pelatihan_relevan');
            $table->string('harapan_pelatihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_pelatihan');
    }
};
