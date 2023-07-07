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
        Schema::create('peserta_studi_dampak', function (Blueprint $table) {
            $table->id();
            $table->string('perubahan_posisi');
            $table->string('posisi_sebelum');
            $table->string('posisi_sesudah');
            $table->string('topik_pekerjaan');
            $table->string('topik_kinerja');
            $table->string('topik_sulit');
            $table->string('topik_tidak_relevan');
            $table->string('rekomendasi_pelatihan');
            $table->string('pelatihan_yang_diperlukan'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_studi_dampak');
    }
};
