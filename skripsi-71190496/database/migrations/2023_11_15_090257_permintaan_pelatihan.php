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
        
        Schema::create('permintaan_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('nama_mitra');
            $table->string('judul_pelatihan');
            $table->date('waktu_pelaksanaan');
            $table->text('request_khusus')->nullable();
            $table->timestamps();
        });

        Schema::create('assessment_dasar', function (Blueprint $table) {
            $table->id('id_assesment_dasar');
            $table->unsignedBigInteger('id_permintaan');
            $table->string('masalah');
            $table->string('kebutuhan');
            $table->string('materi');
            $table->timestamps();
        });

        Schema::create('assessment_peserta', function (Blueprint $table) {
            $table->id('id_assesment_peserta');
            $table->unsignedBigInteger('id_permintaan');
            $table->string('nama_peserta');
            $table->string('jenis_kelamin');
            $table->string('jabatan');
            $table->string('tanggung_jawab');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permintaan_pelatihan');
        Schema::dropIfExists('assessment_dasar');
        Schema::dropIfExists('assessment_peserta');
    }
};
