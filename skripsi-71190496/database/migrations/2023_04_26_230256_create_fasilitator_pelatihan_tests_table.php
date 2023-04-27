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
        Schema::create('fasilitator_pelatihan_tests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitator');
            $table->string('tempat_tgl_lahir');
            $table->string('email_fasilitator');
            $table->string('nomor_telepon');
            $table->string('alamat');
            $table->integer('id_gender');
            $table->integer('id_internal_eksternal');
            $table->string('asal_lembaga');
            $table->string('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitator_pelatihan_tests');
    }
};
