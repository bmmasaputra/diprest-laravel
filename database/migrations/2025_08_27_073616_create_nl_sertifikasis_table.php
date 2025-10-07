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
        Schema::create('nl_sertifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20);
            $table->string('nama_skema_sertifikasi', 255);
            $table->string('tingkat_kegiatan', 255);
            $table->date('tahun_kegiatan_a', 255)->nullable();
            $table->date('tanggal_kegiatan_e', 255)->nullable();
            $table->integer('tahun_kegiatan');
            $table->string('dosen_pendamping', 255)->nullable();
            $table->string('file_sertifikat', 255)->nullable();
            $table->timestamp('modified')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nl_sertifikasis');
    }
};
